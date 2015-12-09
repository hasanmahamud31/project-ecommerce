<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\OrderModel;
use App\Model\Admin\OrderedProductModel;
use App\Model\Admin\UserModel;
use App\Model\Admin\CommentsModel;
use App\User;
use DB;
use PDF;
use App;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = OrderModel::where('delation_status', 0)->get();
//     dd($data);
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
    public function show_product($id) {
        $datam = OrderedProductModel::where('id', $id)->get();
        $order_id = $datam->first()['order_id'];
        $data = OrderedProductModel::where('order_id', $order_id)->where('del', 0)->get();
        if (count($data) > 1) {
            OrderedProductModel::where('id', $id)->update(['del' => 1]);
            return back()->with('message', 'status change successfully.....');
        } else {
            OrderedProductModel::where('id', $id)->update(['del' => 1]);
            OrderModel::where('id', $order_id)->update(['status' => 0]);
            return redirect()->route('order_view')->with('message', 'order deleted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        //
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
      return   PDF::loadHTML($html)->setPaper('a4')->setOrientation('landscape')->setWarnings(false)->stream('download.pdf');
    }

    /**
     * product quantity update.......
     */
    public function update(Request $request) {

        $input = $request->all();
        $id = $input['id'];
        $quantity = $input['quantity'];
        $data = OrderedProductModel::findOrfail($id);
        $data->update(['quantity' => $quantity]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $data = OrderModel::findOrfail($id);
        $data->update(['delation_status' => 1]);
        return redirect()->route('order_view')->with('message', 'Order delete successfully.....');
    }

}
