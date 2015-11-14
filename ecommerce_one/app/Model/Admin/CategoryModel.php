<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\CategoryModel;

class CategoryModel extends Model {

    protected $table = 'category';
    protected $fillable = ['admin_id', 'name', 'value', 'status'];
    
    /**
     * get all category
     * 
     */
    public static function getCategory(){
       return CategoryModel::where('status','=',1)->get();
        
    }

}

