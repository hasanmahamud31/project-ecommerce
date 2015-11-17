<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


Route::get('/', ['as'=>'userDashboard', 'uses'=>'User\UserController@getUserDashboard']);

 /**
 * admin route start here.....
 * 
*/
Route::get('/admin','Auth\AuthController@getLogin');
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('/admin', 'Auth\AuthController@postLogin');

Route::get('/home', function () {
    if (Auth::guest()) {
        return Redirect::to('/admin');
    } else {
        return Redirect::to('/dashboard');
    }
});


Route::get('/dashboard', function () {
    if (Auth::guest()) {
        return Redirect::to('/admin');
    } else {
        return view('admin.pages.home');
    }
});

Route::group(['middleware' => 'auth'],function(){
// folder of a controller ...........
Route::group(['namespace'=>'Admin'],  function (){
    
Route::get('admin_register',['as'=>'admin_register', 'uses'=>'AdminController@getAdminRegister']);
Route::post('admin_register',['as'=>'admin_register', 'uses'=>'AdminController@store']);

Route::get('manage_admin',['as'=>'manage_admin','uses'=>'AdminController@index']);
Route::get('admin_edit/{id}/{access_id}',['as'=>'admin_manage_edit','uses'=>'AdminController@edit']);
Route::post('admin_update/{id}',['as'=>'admin_manage_update','uses'=>'AdminController@update']);
Route::get('admin_delete/{id}',['as'=>'admin_manage_delete','uses'=>'AdminController@delete']);
Route::get('admin_status/{id}',['as'=>'admin_manage_status','uses'=>'AdminController@admin_manage_status'])->where(['id' => '[0-9]+']);


//staff route start from here.......................

Route::get('staff_register',['as'=>'staff_register', 'uses'=>'StaffController@getStaffRegister']);
Route::post('staff_register',['as'=>'staff_register', 'uses'=>'StaffController@store']);
Route::get('staff_manage',['as'=>'staff_manage','uses'=>'StaffController@index']);
Route::get('staff_edit/{id}/{access_id}',['as'=>'staff_manage_edit','uses'=>'StaffController@edit']);
Route::post('staff_update/{id}',['as'=>'staff_manage_update','uses'=>'StaffController@update']);
Route::get('staff_delete/{id}',['as'=>'staff_manage_delete','uses'=>'StaffController@delete']);
Route::get('/staff_status/{id}',['as'=>'staff_manage_status','uses'=>'StaffController@staff_manage_status'])->where(['id' => '[0-9]+']);

//reseller route start from here.......................

Route::get('reseller_register',['as'=>'reseller_register', 'uses'=>'ResellerController@getResellerRegister']);
Route::post('reseller_register',['as'=>'reseller_register', 'uses'=>'ResellerController@store']);
Route::get('reseller_manage',['as'=>'reseller_manage','uses'=>'ResellerController@index']);
Route::get('reseller_edit/{id}/{access_id}',['as'=>'reseller_manage_edit','uses'=>'ResellerController@edit']);
Route::post('reseller_update/{id}',['as'=>'reseller_manage_update','uses'=>'ResellerController@update']);
Route::get('reseller_delete/{id}',['as'=>'reseller_manage_delete','uses'=>'ResellerController@delete']);
Route::get('/reseller_status/{id}',['as'=>'reseller_manage_status','uses'=>'ResellerController@reseller_manage_status'])->where(['id' => '[0-9]+']);


//user route start from here.......................
Route::get('user_register',['as'=>'user_register', 'uses'=>'UserController@getUserRegister']);
Route::post('user_register',['as'=>'user_register', 'uses'=>'UserController@store']);
Route::get('user_manage',['as'=>'user_manage','uses'=>'UserController@index']);
Route::get('user_edit/{id}/{access_id}',['as'=>'user_manage_edit','uses'=>'UserController@edit']);
Route::post('user_update/{id}',['as'=>'user_manage_update','uses'=>'UserController@update']);
Route::get('user_delete/{id}',['as'=>'user_manage_delete','uses'=>'UserController@delete']);
Route::get('/user_status/{id}',['as'=>'user_manage_status','uses'=>'UserController@user_manage_status'])->where(['id' => '[0-9]+']);

//category route start from here.......................
Route::get('category_view',['as'=>'category_view', 'uses'=>'CategoryController@index']);
Route::get('add_category_form',['as'=>'add_category_form', 'uses'=>'CategoryController@create']);
Route::post('store_Category',['as'=>'store_category', 'uses'=>'CategoryController@store']);
Route::get('/category_status/{id}',['as'=>'category_status','uses'=>'CategoryController@show'])->where(['id' => '[0-9]+']);
Route::get('category_edit/{id}',['as'=>'edit_category','uses'=>'CategoryController@edit'])->where(['id' => '[0-9]+']);
Route::post('category_update/{id}',['as'=>'update_category','uses'=>'CategoryController@update'])->where(['id' => '[0-9]+']);
Route::get('category_delete/{id}',['as'=>'delete_category','uses'=>'CategoryController@destroy'])->where(['id' => '[0-9]+']);

//subcategory route start from here.......................
Route::get('subcategory_view',['as'=>'subcategory_view', 'uses'=>'SubCategoryController@index']);
Route::get('add_subcategory_form',['as'=>'add_subcategory_form', 'uses'=>'SubCategoryController@create']);
Route::post('store_SubCategory',['as'=>'store_subcategory', 'uses'=>'SubCategoryController@store']);
Route::get('/subcategory_status/{id}',['as'=>'subcategory_status','uses'=>'SubCategoryController@show'])->where(['id' => '[0-9]+']);
Route::get('subcategory_edit/{id}',['as'=>'edit_subcategory','uses'=>'SubCategoryController@edit'])->where(['id' => '[0-9]+']);
Route::post('subcategory_update/{id}',['as'=>'update_subcategory','uses'=>'SubCategoryController@update'])->where(['id' => '[0-9]+']);
Route::get('subcategory_delete/{id}',['as'=>'delete_subcategory','uses'=>'SubCategoryController@destroy'])->where(['id' => '[0-9]+']);

//product route start from here.......................
Route::get('product_view',['as'=>'product_view', 'uses'=>'ProductController@index']);
Route::get('ajax_search_subcategory/{id}',['as'=>'ajax_search_subcategory', 'uses'=>'ProductController@ajax_search_subcategory']);
Route::get('add_product_form',['as'=>'add_product_form', 'uses'=>'ProductController@create']);
Route::post('store_Product',['as'=>'store_product', 'uses'=>'ProductController@store']);
Route::get('/product_status/{id}',['as'=>'product_status','uses'=>'ProductController@show'])->where(['id' => '[0-9]+']);
Route::get('product_edit/{id}',['as'=>'edit_product','uses'=>'ProductController@edit'])->where(['id' => '[0-9]+']);
Route::post('product_update/{id}',['as'=>'update_product','uses'=>'ProductController@update'])->where(['id' => '[0-9]+']);
Route::get('product_delete/{id}',['as'=>'delete_product','uses'=>'ProductController@destroy'])->where(['id' => '[0-9]+']);



});
});




/**
 * Reseller route start from here.....
 * 
*/
Route::get('/reseller','Admin\ResellerController@index');





/**
 * Reseller route end here.....
 * 
*/


Route::get('logout', 'Auth\AuthController@getLogout');

