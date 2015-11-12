<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\SubCategoryModel;
use App\Model\Admin\ProductModel;
use Auth;
use Validator;
use DB;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = CategoryModel::all();
//     dd($data);
        return view('admin.pages.category.category_manage')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.pages.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $admin = Auth::User();
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:120|unique:category',
                    'value' => 'required|max:120|unique:category',
        ]);
        $data = $request->all();
        if ($validator->fails()) {
            return redirect('/add_category_form')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            CategoryModel::create([
                'admin_id' => $admin->id,
                'name' => $data['name'],
                'value' => $data['value'],
                'status' => 1,
            ]);
            return redirect()->route('category_view')->with('message', 'New Category insert successfully....');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
//        dd($id);
        $data = CategoryModel::findOrfail($id);
        if ($data->status == 0) {
            CategoryModel::where('id', $id)->update(['status' => 1]);
            return redirect()->route('category_view')->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            $this->subcategory_status($id);
            CategoryModel::where('id', $id)->update(['status' => 0]);
            return redirect()->route('category_view')->with('message', 'status change successfully.....');
        }
    }

    public function subcategory_status($id) {

        DB::transaction(function($id) use ($id) {
            //this code for Sub category status inactive .....
            $data = SubCategoryModel::where('category_id', $id)->get();
            foreach ($data as $d) {
                if ($d->status == 1) {
                    //check for product.......
                    $this->product_status($d->id);
                    //check for product inactive
                    $SubCat = SubCategoryModel::findOrfail($d->id);
                    $SubCat->update(['status' => 0]);
                }
            }
            // upto this ..... 
            // DB::table('users')->update(array('votes' => 1));
            // DB::table('posts')->delete();
        });
    }

    public function product_status($id) {

        DB::transaction(function($id) use ($id) {
            //upto this code for Sub category status inactive .....
            $Pro = ProductModel::where('subcategory_id', $id)->get();
            foreach ($Pro as $p) {
                if ($p->status == 1) {
                    $datam = ProductModel::findOrfail($p->id);
                    $datam->update(['status' => 0]);
                }
            }
            // upto this .....
        });
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = CategoryModel::where('id', $id)->get();
        // dd($data);
        return view('admin.pages.category.category_edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        $data = CategoryModel::findOrfail($id);
        $data->update($input);
        return redirect()->route('category_view')->with('message', 'change successfully.....');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $data = CategoryModel::findOrfail($id);
        $data->delete($id);
        return redirect()->route('category_view')->with('message', 'category data delete successfully.....');
    }

}
