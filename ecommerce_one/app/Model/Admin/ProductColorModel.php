<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductColorModel extends Model
{
    /**
     * store the table name for poduct color
     * 
     * @var string
     */
    protected $table = 'product_color';
    
    /**
     * store the fillable or insertable field list in database
     * 
     * @var array
     */
    protected $fillable = ['product_id', 'color_name', 'status'];
    
    /**
     * shows the realation between product color and product table
     * 
     * @return collection
     */
    public function product() {
        return $this->belongsTo('App\Model\Admin\ProductModel', 'id');
    }
}
