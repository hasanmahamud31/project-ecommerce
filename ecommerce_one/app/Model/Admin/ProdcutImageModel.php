<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProdcutImageModel extends Model {

    protected $table = 'product_image';
    protected $fillable = ['product_id', 'image_path','status'];
}
