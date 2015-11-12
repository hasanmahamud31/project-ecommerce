<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\ProductModel;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\SubCategoryModel;
use App\Model\Admin\ProdcutImageModel;
use Auth;
use Validator;
use DB;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = DB::table('product')
                ->join('category', 'category.id', '=', 'product.category_id')
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
                ->select('product.*', 'category.name', 'subcategory.sub_name')
                ->get();
//     dd($data);
        return view('admin.pages.product.product_manage')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $cat = CategoryModel::where('status', 1)->get();
        $subcat = SubCategoryModel::where('status', 1)->get();
        return view('admin.pages.product.add_product')
                        ->with('cat', $cat)
                        ->with('subcat', $subcat);
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
        $validator = Validator::make($data, [
                    'sku' => 'required|unique:product',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'product_name' => 'required',
                    'brand_name' => 'required',
                    'product_price' => 'required',
                    'photo1' => 'required|image|unique:product_image,image_path',
                    'photo2' => 'required|image|unique:product_image,image_path',
                    'photo3' => 'image|unique:product_image,image_path',
                    'photo4' => 'image|unique:product_image,image_path',
        ]);

        if ($validator->fails()) {
            return redirect('/add_product_form')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $pro_id = ProductModel::create([
                        'admin_id' => $admin->id,
                        'category_id' => $data['category_id'],
                        'subcategory_id' => $data['subcategory_id'],
                        'sku' => $data['sku'],
                        'product_name' => $data['product_name'],
                        'brand_name' => $data['brand_name'],
                        'product_quantity' => $data['product_quantity'],
                        'product_description' => $data['product_description'],
                        'product_price' => $data['product_price'],
                        'status' => 1,
            ]);
            if ($request->hasFile('photo1')->isValid()->move($destinationPath)) {
                ProdcutImageModel::create([
                    'product_id' => $pro_id->id,
                    'product_id' => $destinationPath,
                    'status' => 1,
                ]);
            }
            if ($request->hasFile('photo1')->isValid()->move($destinationPath)) {
                ProdcutImageModel::create([
                    'product_id' => $pro_id->id,
                    'product_id' => $destinationPath,
                    'status' => 1,
                ]);
            }
            if ($request->hasFile('photo2')->isValid()->move($destinationPath)) {
                ProdcutImageModel::create([
                    'product_id' => $pro_id->id,
                    'product_id' => $destinationPath,
                    'status' => 1,
                ]);
            }
            if ($request->hasFile('photo3')->isValid()->move($destinationPath)) {
                ProdcutImageModel::create([
                    'product_id' => $pro_id->id,
                    'product_id' => $destinationPath,
                    'status' => 1,
                ]);
            }
            if ($request->hasFile('photo4')->isValid()->move($destinationPath)) {
                ProdcutImageModel::create([
                    'product_id' => $pro_id->id,
                    'product_id' => $destinationPath,
                    'status' => 1,
                ]);
            }
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
        $data = ProductModel::findOrfail($id);
        if ($data->status == 0) {
            //check for category.....
            $cat_info = CategoryModel::findOrfail($data->category_id);
            if ($cat_info->status == 1) {
                //check for sub category.....
                $subcat_info = SubCategoryModel::findOrfail($data->subcategory_id);
                if ($subcat_info->status == 1) {
                    ProductModel::where('id', $id)->update(['status' => 1]);
                    return redirect()->route('product_view')->with('message', 'status change successfully.....');
                } else {
                    return redirect()->route('product_view')->with('message', 'please Active sub category first.....');
                }
                // sub category checking complete.....
            } else {
                return redirect()->route('product_view')->with('message', 'please Active category first.....');
            }

            // category checking complete.....
        } elseif ($data->status == 1) {
            ProductModel::where('id', $id)->update(['status' => 0]);
            return redirect()->route('product_view')->with('message', 'status change successfully.....');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = ProductModel::where('id', $id)->get();
        $category_info = CategoryModel::where('status', 1)->get();
        // dd($data);
        return view('admin.pages.product.product_edit')->with('data', $data)->with('category_info', $category_info);
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
        $data = ProductModel::findOrfail($id);
        $data->update($input);
        return redirect()->route('product_view')->with('message', 'change successfully.....');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $data = ProductModel::findOrfail($id);
        $data->delete($id);
        return redirect()->route('product_view')->with('message', 'product data delete successfully.....');
    }

}
