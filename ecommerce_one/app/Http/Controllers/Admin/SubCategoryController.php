<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\SubCategoryModel;
use App\Model\Admin\CategoryModel;
use Auth;
use Validator;
use DB;

class SubCategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = DB::table('subcategory')
                ->join('category', 'category.id', '=', 'subcategory.category_id')
                ->select('subcategory.*', 'category.name')
                ->get();
//     dd($data);
        return view('admin.pages.subcategory.subcategory_manage')->with('data', $data);
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data=  CategoryModel::where('status',1)->get();
        return view('admin.pages.subcategory.add_subcategory')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $admin = Auth::User();
        $data = $request->all();
        $validator = Validator::make($data,[
                    'sub_name' => 'required|max:120|unique:subcategory',
                    'value' => 'required|max:120|unique:subcategory',
        ]);
        
        if ($validator->fails()) {
            return redirect('/add_subcategory_form')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            SubCategoryModel::create([
                'admin_id' => $admin->id,
                'category_id' => $data['category_id'],
                'sub_name' => $data['sub_name'],
                'value' => $data['value'],
                'status' => 1,
            ]);
            return redirect()->route('subcategory_view')->with('message', 'New  Sub Category insert successfully....');
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
        $data = SubCategoryModel::findOrfail($id);
        if ($data->status == 0) {
            //check for category.....
            $cat_info = CategoryModel::findOrfail($data->category_id);
            if($cat_info->status==1)
            {               
                SubCategoryModel::where('id', $id)->update(['status' => 1]);
                return redirect()->route('subcategory_view')->with('message', 'status change successfully.....');
            }else{
                  return redirect()->route('subcategory_view')->with('message', 'please Active category first.....');  
            }

            //checking complete.....
        } elseif ($data->status == 1) {
            SubCategoryModel::where('id', $id)->update(['status' => 0]);
            return redirect()->route('subcategory_view')->with('message', 'status change successfully.....');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = SubCategoryModel::where('id', $id)->get();
        $category_info=  CategoryModel::where('status',1)->get();
        // dd($data);
        return view('admin.pages.subcategory.subcategory_edit')->with('data', $data)->with('category_info',$category_info);
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
        $data = SubCategoryModel::findOrfail($id);
        $data->update($input);
        return redirect()->route('subcategory_view')->with('message', 'change successfully.....');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $data = SubCategoryModel::findOrfail($id);
        $data->delete($id);
        return redirect()->route('subcategory_view')->with('message', 'subcategory data delete successfully.....');
    }

}
