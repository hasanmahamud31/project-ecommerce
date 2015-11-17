<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\CategoryModel;
use App\Model\Admin\SubCategoryModel;


class CategoryModel extends Model {

    protected $table = 'category';
    protected $fillable = ['admin_id', 'name', 'value', 'status'];

    /**
     * get all category
     * 
     * @return type collection
     */
    
    public static function getCategory(){        
      $categories = CategoryModel::where('status','=',1)->has('subCategory')->with('subCategory')->get();
      
      return $categories;
    }

    /**
     * get all sub  category
     * 
     */
    public static function getSubCategory($id) {
        $comments = CategoryModel::find($id)->subCategory()->get();
              
        return $comments;
    }

    /**
     * shows relation between Category and subCategory
     * 
     * @return type collection
     */
    public function subCategory() {
        return $this->hasMany('App\Model\Admin\SubCategoryModel', 'category_id');
    }
    /**
     * shows relation between Category and Product
     * 
     * @return type collection
     */
    public function product() {
        return $this->hasMany('App\Modle\Admin\ProductModel', 'category_id');
    }

}
