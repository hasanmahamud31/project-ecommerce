<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class DeletedHistory extends Model
{
    protected $table='deleted_histories';
     protected $fillable = ['order_id', 'ordered_product_id','deleted_by','comment','status'];

}
