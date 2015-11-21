<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductColorModel extends Model
{
        protected $table = 'product_color';
    protected $fillable = ['product_id', 'color_name', 'status'];
}
