<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model {

    protected $table = 'subcategory';
    protected $fillable = ['admin_id', 'category_id', 'sub_name', 'value', 'status'];

    public function category(){
        return $this->hasMany('category', 'id', 'category_id');      
    }
    
}
