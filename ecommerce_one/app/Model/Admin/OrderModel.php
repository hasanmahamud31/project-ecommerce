<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
     protected $table='orders';
     protected $fillable = ['user_id', 'product_id', 'product_quantity', 'prodcut_price', 'product_total_price', 'product_discount', 'delivery_address_one', 'delivery_address_two', 'status'];
}
