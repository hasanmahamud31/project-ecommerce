<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\SubCategoryModel;
use App\Modle\Admin\ProductModel;

class SubCategoryModel extends Model {
    /**
     * store table name
     * 
     * @var type string
     */
    protected $table = 'subcategory';
    
    /**
     * store fillable field for the database
     * 
     * @var type array
     */
    protected $fillable = ['admin_id', 'category_id', 'sub_name', 'value', 'status'];
    
    /**
     * 
     * 
     * @return type category collection
     */
    public static function getSubCategoryByCategory($id){
        return SubCategoryModel::where('category_id', '=', $id);
    }
    
    /**
     * shows relation between SubCategory and Category
     * 
     * @return type collection
     */
    public function category(){
        return $this->belongsTo('App\Model\Admin\CategoryModel', 'id');
    }
    
    /**
     * shows relation between SubCategory and Product
     * 
     * @return type collection
     */
    public function product(){
        return $this->hasMany('App\Modle\Admin\ProductModel', 'subcategory_id');
    }
    
    
    
}
