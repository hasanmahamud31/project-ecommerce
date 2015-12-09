<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\OrderModel;
use DB;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = OrderModel::where('delation_status', 0)->where('status', 1)->get();
//     dd($data);
        return view('admin.pages.new_order.order_manage')->with('data', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $data = OrderModel::findOrfail($id);
        if ($data->status == 1) {
            OrderModel::where('id', $id)->update(['status' => 0]);
            return redirect()->route('order_view')->with('message', 'status change successfully.....');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
//
    }

    public function view_order($id) {
      //  $data = OrderModel::where('delation_status', 0)->where('status', 1)->get();
//     dd($data);
        //->with('data', $data);
        return view('admin.pages.new_order.view_order');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $data = OrderModel::findOrfail($id);
        $data->update(['delation_status' => 1]);
        return redirect()->route('order_view')->with('message', 'Order delete successfully.....');
    }

}
