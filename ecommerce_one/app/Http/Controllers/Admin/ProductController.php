<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\ProductModel;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\SubCategoryModel;
use App\Model\Admin\ProdcutImageModel;
use App\Model\Admin\ProductSizeModel;
use App\Model\Admin\ProductColorModel;
use Auth;
use Validator;
use DB;
use Input;
use Storage;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user=Auth::user();
        $access_level=$user->access_level;
        $id=$user->id;
       if($access_level==11 || $access_level==12){
            $data = DB::table('product')
                ->join('category', 'category.id', '=', 'product.category_id')
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
                ->select('product.*', 'category.name', 'subcategory.sub_name')
                ->get();
//     dd($data);      
       }elseif ($access_level==13) {
            $data = DB::table('product')->where('access_level',$access_level)->where('product.admin_id',$id)
                ->join('category', 'category.id', '=', 'product.category_id')
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
                ->select('product.*', 'category.name', 'subcategory.sub_name')
                ->get();
//     dd($data);           
        }elseif ($access_level==21) {
             $data = DB::table('product')->where('access_level',$access_level)
                ->join('category', 'category.id', '=', 'product.category_id')
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
                ->select('product.*', 'category.name', 'subcategory.sub_name')
                ->get();
//     dd($data);            
        }
        return view('admin.pages.product.product_manage')->with('data', $data);
    }

    public function ajax_search_subcategory() {
        $id = $_GET['id'];
        $data = SubCategoryModel::where('category_id', $id)->get();
        echo '<option value=" ">Select Sub Category..</option>';
        foreach ($data as $row) {
            echo "<option value=" . $row['id'] . ">" . $row['sub_name'] . "</option>";
        }
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
        $id=$admin->id;
        $access_level=$admin->access_level;
       // dd($access_level);
        
        $data = $request->all();
        $validator = Validator::make($data, [
                    'sku' => 'required|unique:product,sku',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'product_name' => 'required',
                    'brand_name' => 'required',
                    'product_price' => 'required',
                    'image1' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect('/add_product_form')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $pro_id = ProductModel::create([
                        'admin_id' => $id,
                        'access_level' =>$access_level,
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

            //image one start here..........
            if (Input::file('image1')) {
                $image = Input::file('image1');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = 'product_images/';
                $request->file('image1')->move($path, $filename);
                $image_path = $path . $filename;
            }
            ProdcutImageModel::create([
                'product_id' => $pro_id->id,
                'image_path' => $image_path,
                'status' => 1,
            ]);
            //image one end heree.............
            //image two start  heree.............
            if (Input::file('image2')) {
                $image = Input::file('image2');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = 'product_images/';
                $request->file('image2')->move($path, $filename);
                $image_path = $path . $filename;
            }
            ProdcutImageModel::create([
                'product_id' => $pro_id->id,
                'image_path' => $image_path,
                'status' => 1,
            ]);
            //imagee two end here........
            //imagee three start here........
            if (Input::file('image3')) {
                $image = Input::file('image3');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = 'product_images/';
                $request->file('image3')->move($path, $filename);
                $image_path = $path . $filename;
            }
            ProdcutImageModel::create([
                'product_id' => $pro_id->id,
                'image_path' => $image_path,
                'status' => 1,
            ]);
            //image three end here........
            //image four end here........
            if (Input::file('image4')) {
                $image = Input::file('image4');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $path = 'product_images/';
                $request->file('image4')->move($path, $filename);
                $image_path = $path . $filename;
            }
            ProdcutImageModel::create([
                'product_id' => $pro_id->id,
                'image_path' => $image_path,
                'status' => 1,
            ]);
            //image four end here........
            return redirect()->route('add_product_form')->with('message', 'status change successfully.....');
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
        $cat = CategoryModel::where('status', 1)->get();
        $subcat = SubCategoryModel::where('status', 1)->get();
        // dd($data);
        return view('admin.pages.product.product_edit')->with('data', $data)->with('cat', $cat)->with('subcat', $subcat);
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

    //image add ,edit, delete,update start from here......
    //image add ,edit, delete,update start from here......
    //image add ,edit, delete,update start from here......
    public function view_product_image($id) {
        $data = ProdcutImageModel::where('product_id', $id)->get();
        return view('admin.pages.product.product_image_manage')
                        ->with('data', $data)
                        ->with('product_id', $id);
    }

    public function product_image_status($id) {
//        dd($id);
        $data = ProdcutImageModel::findOrfail($id);
        if ($data->status == 0) {
            ProdcutImageModel::where('id', $id)->update(['status' => 1]);
            return back()->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            ProdcutImageModel::where('id', $id)->update(['status' => 0]);
            return back()->with('message', 'status change successfully.....');
        }
    }

    public function add_product_image($id) {
        return view('admin.pages.product.image_add')
                        ->with('id', $id);
    }

    public function store_image(Request $request) {
        $data = $request->all();
        if (Input::file('image')) {
            $image = Input::file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'product_images/';
            $request->file('image')->move($path, $filename);
            $image_path = $path . $filename;
        }
        ProdcutImageModel::create([
            'product_id' => $data['product_id'],
            'image_path' => $image_path,
            'status' => 1,
        ]);
        return back()->with('message', 'status change successfully.....');
    }

    public function delete_image_product($id) {
        $data = ProdcutImageModel::findOrfail($id);
        // $base_path=base_path($data->image_path);
        //$image_name=  basename($data->image_path);
        //  dd($image_name);
        // Storage::delete($image_name);
        $data->delete($id);
        return back()->with('message', 'Product Image successfully deleted..');
    }

    public function download_image_product($id) {
        $data = ProdcutImageModel::findOrfail($id);
        return response()->download($data->image_path);
    }

    //product size add ,edit, delete,update start from here......
    //product size add ,edit, delete,update start from here......
    //product size add ,edit, delete,update start from here......
    public function view_product_size($id) {
        $data = ProductSizeModel::where('product_id', $id)->get();
        return view('admin.pages.product.product_size_manage')
                        ->with('data', $data)
                        ->with('product_id', $id);
    }

    public function product_size_status($id) {
//        dd($id);
        $data = ProductSizeModel::findOrfail($id);
        if ($data->status == 0) {
            ProductSizeModel::where('id', $id)->update(['status' => 1]);
            return back()->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            ProductSizeModel::where('id', $id)->update(['status' => 0]);
            return back()->with('message', 'status change successfully.....');
        }
    }

    public function add_product_size($id) {
        return view('admin.pages.product.size_add')
                        ->with('id', $id);
    }

    public function store_size(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
                    'size_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/add_size_form')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            ProductSizeModel::create([

                        'product_id' => $data['product_id'],
                        'size_name' => $data['size_name'],
                        'status' => 1,
            ]);
            return back()->with('message', 'status change successfully.....');
        }
    }
    public function delete_size_product($id) {
        $data = ProductSizeModel::findOrfail($id);
        $data->delete($id);
        return back()->with('message','Product Image size successfully deleted..');
    }
    
    
    //product size add ,edit, delete,update start from here......
    //product size add ,edit, delete,update start from here......
    //product size add ,edit, delete,update start from here......
    public function view_product_color($id) {
        $data = ProductColorModel::where('product_id', $id)->get();
        return view('admin.pages.product.product_color_manage')
                        ->with('data', $data)
                        ->with('product_id', $id);
    }

    public function product_color_status($id) {
//        dd($id);
        $data = ProductColorModel::findOrfail($id);
        if ($data->status == 0) {
            ProductColorModel::where('id', $id)->update(['status' => 1]);
            return back()->with('message', 'status change successfully.....');
        } elseif ($data->status == 1) {
            ProductColorModel::where('id', $id)->update(['status' => 0]);
            return back()->with('message', 'status change successfully.....');
        }
    }

    public function add_product_color($id) {
        return view('admin.pages.product.color_add')
                        ->with('id', $id);
    }

    public function store_color(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
                    'color_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/add_color_form')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            ProductColorModel::create([

                        'product_id' => $data['product_id'],
                        'color_name' => $data['color_name'],
                        'status' => 1,
            ]);
            return back()->with('message', 'status change successfully.....');
        }
    }
    public function delete_color_product($id) {
        $data = ProductColorModel::findOrfail($id);
        $data->delete($id);
        return back()->with('message', 'Product color size successfully deleted..');
    }

}
