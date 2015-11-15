<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\SubCategoryModel;

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
     * shows relation between Product and SubCategory
     * 
     * @return type collection
     */
    public function subCategory() {
        return $this->belongsTo('App\Model\Admin\SubCategoryModel', 'id');
    }
}
