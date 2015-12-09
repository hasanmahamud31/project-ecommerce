<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderedProductModel extends Model {

    protected $table = 'ordered_products';
    protected $fillable = ['order_id', 'product_id', 'color_id', 'size_id', 'quantity'];
}
