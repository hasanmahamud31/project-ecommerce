<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model {

    protected $table = 'product_size';
    protected $fillable = ['product_id', 'size_name', 'status'];

}
