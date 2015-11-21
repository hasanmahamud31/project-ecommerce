<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\ProductModel;
use App\Model\User\Session;
use URL;
use Cart;

class UserController extends Controller {

    /**
     * Display a user end front page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserDashboard() {
        $products = ProductModel::getProduct();
        $categoryAndSubcategory = CategoryModel::getCategory();
        $cartProducts = Cart::getContent();

        return view('user.pages.dashboard')
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $products)
                        ->with('cartProducts', $cartProducts);
        
    }

    /**
     * Display a single product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSingleProduct($productId) {
        $product = ProductModel::getProductById($productId);
        $categoryAndSubcategory = CategoryModel::getCategory();
        $cartProducts = Cart::getContent();
       
//        return view('user.pages.dashboard')
//                ->with('categoryAndSubcategory', $categoryAndSubcategory)
//                ->with('products', $products);
        return view('user.pages.product')
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $product)
                        ->with('cartProducts', $cartProducts);
    }

    /**
     * Display a single product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSubCategoryProduct($categoryId) {
        $products = ProductModel::getProductBySubCategoryId($categoryId);
        $categoryAndSubcategory = CategoryModel::getCategory();
        $cartProducts = Cart::getContent();
        
        if (count($products) > 0) {
            return view('user.pages.dashboard')
                            ->with('categoryAndSubcategory', $categoryAndSubcategory)
                            ->with('products', $products)
                            ->with('cartProducts', $cartProducts);
        } else {
            return view('user.pages.category_empty')
                            ->with('categoryAndSubcategory', $categoryAndSubcategory)
                            ->with('products', $products)
                            ->with('cartProducts', $cartProducts);
        }
    }

    /**
     * add to cart a single product page.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($productId) {
        $products = ProductModel::getProductById($productId);
        $categoryAndSubcategory = CategoryModel::getCategory();
        
        Cart::add(array(
            'id' => $products['id'],
            'name' => $products['product_name'],
            'price' => $products['product_price'],
            'quantity' => 1,
            'attributes' => array()
        ));
        
        $cartProducts = Cart::getContent();
        
        return back()
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $products)
                        ->with('cartProducts', $cartProducts);
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
