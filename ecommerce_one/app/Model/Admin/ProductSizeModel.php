<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\ProductModel;

class ProductSizeModel extends Model {
    /**
     * store the table name for product size
     * 
     * @var string
     */
    protected $table = 'product_size';
    
    /**
     * store fillable or insertable field
     * 
     * @var array
     */
    protected $fillable = ['product_id', 'size_name', 'status'];
    
    /**
     * shows relation between ProductImageModel and ProductModel
     * 
     * @return type collection
     */
    public function product(){
        return $this->belongsTo('App\Model\Admin\ProductModel', 'id');
    }
}
