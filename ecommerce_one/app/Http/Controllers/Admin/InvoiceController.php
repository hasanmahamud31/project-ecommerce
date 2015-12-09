<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\OrderedProductModel;
use App\Model\Admin\InvoiceModel;
use Auth;

class InvoiceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = InvoiceModel::where('delation_status', 0)->where('status', 1)->get();
//     dd($data);
        return view('admin.pages.invoice.invoice_manage')->with('data', $data);
    }

    /**
     * freject product.
     */
    public function reject_product($id) {
        $user_info = Auth::user();
        $admin_id = $user_info->id;
        $data = InvoiceModel::findOrfail($id);
        if ($data->status == 1) {
            InvoiceModel::where('id', $id)->update(['status' => 0, 'receive_quantity' => 0, 'comment' => 'product not received', 'admin_id' => $admin_id,]);
            return redirect()->route('invoice_view')->with('message', 'status change successfully.....');
        } else {
            return redirect()->route('invoice_view')->with('message', 'Order not found.....');
        }
    }

    /**
     * freject product.
     */
    public function full_accept_product($id) {
        $user_info = Auth::user();
        $admin_id = $user_info->id;
        $data = InvoiceModel::findOrfail($id);
        if ($data->status == 1) {
            $product = OrderedProductModel::where('id', $data->product_id)->select('quantity')->first();
            //  dd($product);
            InvoiceModel::where('id', $id)->update(['status' => 0, 'receive_quantity' => $product->quantity, 'comment' => 'successfully delivered', 'admin_id' => $admin_id,]);
            return redirect()->route('invoice_view')->with('message', 'status change successfully.....');
        } else {
            return redirect()->route('invoice_view')->with('message', 'Order not found.....');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function pertial_accept_product($id) {
        return view('admin.pages.invoice.invoice_ack_add')->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function store_ack_history(Request $request) {
        $input = $request->all();
        //dd($input);
        $id=$input['id'];
        $receive_quantity=$input['receive_quantity'];
         $user_info = Auth::user();
        $admin_id = $user_info->id;
        $data = InvoiceModel::findOrfail($id);
        if ($data->status == 1) {
            InvoiceModel::where('id', $id)->update(['status' => 0, 'receive_quantity' => $receive_quantity, 'comment' => 'partially delivered', 'admin_id' => $admin_id,]);
            return redirect()->route('invoice_view')->with('message', 'status change successfully.....');
        } else {
            return redirect()->route('invoice_view')->with('message', 'Order not found.....');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
