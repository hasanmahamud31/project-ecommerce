<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\SubCategoryModel;
use App\Model\Admin\ProductModel;
use App\Model\Admin\ProdcutImageModel;
use App\Model\Admin\ProductSizeModel;
use App\Model\Admin\ProductColorModel;

class ProductModel extends Model
{
    /**
     * store table name
     * 
     * @var type string
     */
    protected $table = 'product';
    
    /**
     * store fillable field for the database
     * 
     * @var type array
     */
    protected $fillable = ['admin_id','sku', 'category_id', 'subcategory_id', 'product_name', 'brand_name', 'product_quantity', 'product_description', 'product_price', 'status'];
    
    /**
     * send all the product in the data
     * 
     * @return type collection
     */
    
    public static function getProduct() {
        $products = ProductModel::where('status', '=', 1)->has('productImage')->with('productImage')->get();

        return $products;
    }
    
    /**
     *  send product image for product Image table
     *  
     *  @return collection
     */
    public static function getProductImageById($id){
        return ProdcutImageModel::where('product_id', $id)->get();
    }
    
    /**
     * send a single product by its id.
     * 
     * @return type collection
     */
    public static function getProductById($id) {
        //$products = ProductModel::findOrFail($id);
        $products = ProductModel::where('status', '=', 1)->where('id', '=', $id)
                    ->has('productImage')->with('productImage')
                    ->has('productSize')->with('productSize')
                    ->has('productColor')->with('productColor')
                    ->get();
        
        return $products;
    }
    
    /**
     * send a all product by its subcategory.
     * 
     * @return type collection
     */
    public static function getProductBySubCategoryId($subCategoryId) {
        $products = ProductModel::where('subcategory_id', '=', $subCategoryId)->get();
        
        return $products;
    }

    /**
     * shows relation between Product and SubCategory
     * 
     * @return type collection
     */
    public function subCategory() {
        return $this->belongsTo('App\Model\Admin\SubCategoryModel', 'id');
    }
    
    /**
     * shows relation between Product and Category
     * 
     * @return type collection
     */
    public function category(){
        return $this->belongsTo('App\Model\Admin\CategoryModel', 'id');
    }
    
    /**
     * shows relation between ProductModel and ProductImageModel
     * 
     * @return type collection
     */
    public function productImage() {
        return $this->hasMany('App\Model\Admin\ProdcutImageModel', 'product_id');
    }
    
    /**
     * shows relation between ProductModel and ProductSizeModel
     * 
     * @return type collection
     */
    public function productSize() {
        return $this->hasMany('App\Model\Admin\ProductSizeModel', 'product_id');
    }
    
    /**
     * shows relation between ProductModel and ProductColorModel
     * 
     * @return type collection
     */
    public function productColor() {
        return $this->hasMany('App\Model\Admin\ProductColorModel', 'product_id');
    }
}
