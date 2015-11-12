<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProdcutImageModel extends Model {

    protected $primaryKey = 'image_id';
    protected $table = 'product_image';
    protected $fillable = ['product_id', 'image_path','status'];

}
