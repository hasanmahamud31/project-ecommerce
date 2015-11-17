<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\ProductModel;
use URL;

class UserController extends Controller {

    /**
     * Display a user end front page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserDashboard() {
        $products = ProductModel::getProduct();

        $categoryAndSubcategory = CategoryModel::getCategory();

        return view('user.pages.dashboard')
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $products);
//        return view('user.pages.product')
//                ->with('categoryAndSubcategory', $categoryAndSubcategory)
//                ->with('products', $products);
    }

    /**
     * Display a single product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSingleProduct($productId) {
        $product = ProductModel::getProductById($productId);
        //dd($products);
        $categoryAndSubcategory = CategoryModel::getCategory();

//        return view('user.pages.dashboard')
//                ->with('categoryAndSubcategory', $categoryAndSubcategory)
//                ->with('products', $products);
        return view('user.pages.product')
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $product);
    }

    /**
     * Display a single product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubCategoryProduct($categoryId) {
        $products = ProductModel::getProductBySubCategoryId($categoryId);
        //dd(count($products));
        //dd($products);
        $categoryAndSubcategory = CategoryModel::getCategory();
        if (count($products) > 0) {
            return view('user.pages.dashboard')
                            ->with('categoryAndSubcategory', $categoryAndSubcategory)
                            ->with('products', $products);
        } else {
            return view('user.pages.category_empty')
                            ->with('categoryAndSubcategory', $categoryAndSubcategory)
                            ->with('products', $products);
        }
    }

    /**
     * add to cart a single product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($productId) {
        $product = ProductModel::getProductById($productId);
        //session_regenerate_id()
        dd(session_regenerate_id());
        
        return '<li>
        <div class = "clearfix">
        
        <img class = "f_left m_right_10" src = " ' . URL::to('front_end_resource/images/shopping_c_img_1.jpg') . ' " alt = "">
        <!--product description-->
        <div class = "f_left product_description">
        <a href = "#" class = "color_dark m_bottom_5 d_block">Cursus eleifend elit aenean auctor wisi et urna</a>
        <span class = "f_size_medium">Product Code PS34</span>
        </div>
        <!--product price-->
        <div class = "f_left f_size_medium">
        <div class = "clearfix">
        1 x <b class = "color_dark">$99.00</b>
        </div>
        <button class = "close_product color_dark tr_hover"><i class = "fa fa-times"></i></button>
        </div>
        </div>
        </li>';
        //return "fdaf asdf as";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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
        //
    }

}
