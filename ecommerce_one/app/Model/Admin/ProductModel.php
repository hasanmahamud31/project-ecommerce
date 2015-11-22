<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\SubCategoryModel;
use App\Model\Admin\ProductModel;

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
        $products = ProductModel::where('status',1)->get();
        return $products;
    }
    /**
     * send a single product by its id.
     * 
     * @return type collection
     */
    public static function getProductById($id) {
        $products = ProductModel::findOrFail($id);
        
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
    
}
