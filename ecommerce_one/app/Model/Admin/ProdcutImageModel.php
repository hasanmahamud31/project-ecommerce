<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\ProductModel;
use App\Model\Admin\ProductImageModel;

class ProdcutImageModel extends Model {
    /**
     * store the table name
     * 
     * @var string 
     */
    protected $table = 'product_image';
    /**
     * store fillable field or insertable field name
     * 
     * @var array
     */
    protected $fillable = ['product_id', 'image_path','status'];
    
    /**
     * shows relation between ProductImageModel and ProductModel
     * 
     * @return type collection
     */
    public function product(){
        return $this->belongsTo('App\Model\Admin\ProductModel', 'id');
    }
}
