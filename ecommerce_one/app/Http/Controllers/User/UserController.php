<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\ProductModel;
use App\Model\Admin\ProdcutImageModel;
use App\Model\Admin\ProductSizeModel;
use App\Model\Admin\ProductColorModel;
use App\Model\User\Session;
use URL;
use Cart;
use Input;
use Auth;

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
        //dd($product->first()->productSize->first());
        $categoryAndSubcategory = CategoryModel::getCategory();
        $cartProducts = Cart::getContent();
        //dd($cartProducts);
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
    public function addToCart() {
        $cartData = Input::all();
        //dd(array_key_exists('product_color', $cartData));
        $color      = array_key_exists('product_color', $cartData)? $cartData['product_color'] : NULL;
        $size       = array_key_exists('product_size', $cartData) ? $cartData['product_size'] : NULL;
        $quantity   = $cartData['quantity'];
        $productId  = $cartData['product_id'];
        
        //echo " size :  " . $size . " color : " . $color . " quantity : " . $quantity . " product id : " . $productId;        exit();
        
        $products = ProductModel::getProductById($productId);
        //dd($products);
        $categoryAndSubcategory = CategoryModel::getCategory();
        //dd($categoryAndSubcategory);
        //dd($products);
        
        foreach ($products as $product) {
            Cart::add(array(
                'id'            => $product['id'],
                'name'          => $product['product_name'],
                'price'         => $product['product_price'],
                'quantity'      => $quantity,
                'attributes'    => array(
                                'size' =>  $size,
                                'color' => $color
                )
            ));
        }
        $cartProducts = Cart::getContent();
        //dd($cartProducts);
//        return back()
//                    ->with('categoryAndSubcategory', $categoryAndSubcategory)
//                    ->with('products', $products)
//                    ->with('cartProducts', $cartProducts);

        return view('user.pages.product_cart')
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $products)
                        ->with('cartProducts', $cartProducts);
                        
    }

    public function showCart() {
        $products = ProductModel::getProductById($productId);
        //dd($products);
        $categoryAndSubcategory = CategoryModel::getCategory();
        //dd($categoryAndSubcategory);
        //dd($products);
        $cartProducts = Cart::getContent();
        return view('user.pages.product_cart')
                        ->with('categoryAndSubcategory', $categoryAndSubcategory)
                        ->with('products', $products)
                        ->with('cartProducts', $cartProducts);
    }

    /**
     * delete cart product by id
     * 
     * @param product $id
     */
    public function deleteCart() {
        if (Request::ajax()) {
            //return "ajax";
            $product_id = Input::get('id');
            Cart::remove($product_id);
            return true;
        } else {
            
        }
    }
    
    public function postUserLogin() {
        $data = Input::all();
        
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            // Authentication passed...
            //return redirect()->intended('/');
            return back();
        } else {
            return back();
        } 
        
        
    }
    public function getUserLogout() {
        if(Auth::check()) {
            Auth::logout();
            return back();
        } else {
            return redirect()->intended('/');
        }
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
