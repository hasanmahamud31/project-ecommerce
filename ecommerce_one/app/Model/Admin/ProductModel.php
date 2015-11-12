<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $fillable = ['admin_id','sku', 'category_id', 'subcategory_id', 'product_name', 'brand_name', 'product_quantity', 'product_description', 'product_price', 'status'];

}
