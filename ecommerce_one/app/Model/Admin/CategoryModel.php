<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model {

    protected $table = 'category';
    protected $fillable = ['admin_id', 'name', 'value', 'status'];

}
