<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
     protected $table='orders';
     protected $fillable = ['user_id', 'ip','Shipping_address','delation_status','status'];
}
