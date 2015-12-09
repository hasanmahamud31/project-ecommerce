<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\OrderModel;
use App\Model\Admin\OrderedProductModel;
use App\Model\Admin\UserModel;
use App\Model\Admin\CommentsModel;
use App\Model\Admin\InvoiceModel;
use App\User;
use DB,PDF,App,Auth;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $user = Auth::user();
        $access_level = $user->access_level;
        $id = $user->id;
        if ($access_level == 11 || $access_level == 12) {
            $data = OrderModel::where('delation_status', 0)->get();
//     dd($data);
        } elseif ($access_level == 13) {
            $data = OrderModel::where('delation_status', 0)->where('access_level', $access_level)->where('user_id', $id)->get();
//     dd($data);  
        } elseif ($access_level == 21) {
            $data = OrderModel::where('delation_status', 0)->where('access_level', $access_level)->get();
//     dd($data);
        }
        return view('admin.pages.new_order.order_manage')->with('data', $data);
    }

    /**
     * status change of order 
     */
    public function show($id) {
        $data = OrderModel::findOrfail($id);
        if ($data->status == 1) {
            OrderModel::where('id', $id)->update(['status' => 0]);
            return redirect()->route('order_view')->with('message', 'status change successfully.....');
        } else {
            OrderModel::where('id', $id)->update(['status' => 1]);
            return redirect()->route('order_view')->with('message', 'status change successfully.....');
        }
    }

    /**
     * product active inactive status....... 
     */
    public function show_product(Request $request) {
        $input = $request->all();
        //   DB::transaction(function ($input)use ($input) {
        $id = $input['id'];
        $comment = $input['comment'];
        $datam = OrderedProductModel::where('id', $id)->get();
        $order_id = $datam->first()['order_id'];
        $data = OrderedProductModel::where('order_id', $order_id)->where('del', 0)->where('invoice_status', 0)->get();
        if (count($data) > 1) {
            OrderedProductModel::where('id', $id)->update(['del' => 1, 'comment' => $comment]);
            return back()->with('message', 'status change successfully.....');
        } else {
            OrderedProductModel::where('id', $id)->update(['del' => 1, 'comment' => $comment]);
            OrderModel::where('id', $order_id)->update(['delation_status' => 1]);
            return redirect()->route('order_view')->with('message', 'order deleted');
        }
        // });
    }

    /**
     * Submit invoice......
     */
    public function submit_invoice($id) {
        DB::transaction(function ($id)use ($id) {
            $user_info = Auth::user();
            $admin_id = $user_info->id;
            $data = OrderedProductModel::where('order_id', $id)->where('del', 0)->where('invoice_status', 0)->get();
            foreach ($data as $d) {

                OrderedProductModel::where('id', $d->id)->update(['del' => 1, 'invoice_status' => 1, 'comment' => 'successfull', 'order_receiver_id' => $admin_id]);
                OrderModel::where('id', $d->order_id)->update(['delation_status' => 1]);
                InvoiceModel::create([
                    'order_id' => $id,
                    'product_id' => $d->id,
                    'access_level' => $user_info->access_level,
                ]);
            }
        });
        return redirect()->route('order_view');
    }

    public function view_order($id) {
        $data_order = OrderModel::where('delation_status', 0)->where('id', $id)->get();

        foreach ($data_order as $data) {
            $user_id = $data->user_id;
            // dd($user_id);
        }

        $data_user = DB::table('users')->where('users.id', $user_id)
                ->join('customer', 'users.user_id', '=', 'customer.id')
                ->get();
        $data_ordPro = DB::table('ordered_products')->where('order_id', $id)->where('del', 0)
                ->Join('product_color', 'ordered_products.color_id', '=', 'product_color.id')
                ->Join('product_size', 'ordered_products.size_id', '=', 'product_size.id')
                ->Join('product', 'ordered_products.product_id', '=', 'product.id')
                ->select('ordered_products.*', 'product_size.size_name', 'product_color.color_name', 'product.product_name', 'product.product_description', 'product.sku', 'product.product_price')
                ->get();
        // dd($data_ordPro);
        return view('admin.pages.new_order.view_order')->with('data_ordPro', $data_ordPro)->with('data_order', $data_order)->with('data_user', $data_user);
    }

    public function view_order_pdf($id) {
        $data_order = OrderModel::where('delation_status', 0)->where('id', $id)->get();
        foreach ($data_order as $data) {
            $user_id = $data->user_id;
            // dd($user_id);
        }
        $data_user = DB::table('users')->where('users.id', $user_id)
                ->join('customer', 'users.user_id', '=', 'customer.id')
                ->get();
        $data_ordPro = DB::table('ordered_products')->where('order_id', $id)->where('del', 0)
                ->Join('product_color', 'ordered_products.color_id', '=', 'product_color.id')
                ->Join('product_size', 'ordered_products.size_id', '=', 'product_size.id')
                ->Join('product', 'ordered_products.product_id', '=', 'product.id')
                ->select('ordered_products.*', 'product_size.size_name', 'product_color.color_name', 'product.product_name', 'product.product_description', 'product.sku', 'product.product_price')
                ->get();
        // dd($data_ordPro);
        $data = view('admin.pages.new_order.view_order')
                ->with('data_ordPro', $data_ordPro)
                ->with('data_order', $data_order)
                ->with('data_user', $data_user)
                ->render();
        // $data = 1;
        $html = view('admin.pages.new_order.invoice')
                ->with('data_ordPro', $data_ordPro)
                ->with('data_order', $data_order)
                ->with('data_user', $data_user)
                ->render();
        return PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setWarnings(false)->stream('download.pdf');
    }

    /**
     * product quantity update.......
     */
    public function update(Request $request) {
        $input = $request->all();
        DB::transaction(function ($input)use ($input) {
            $id = $input['id'];
            $quantity = $input['quantity'];
            $data = OrderedProductModel::findOrfail($id);
            $data->update(['quantity' => $quantity]);
        });
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        DB::transaction(function ($id)use ($id) {
            $data = OrderModel::findOrfail($id);
            $data->update(['delation_status' => 1]);
        });
        return redirect()->route('order_view')->with('message', 'Order delete successfully.....');
    }

}
