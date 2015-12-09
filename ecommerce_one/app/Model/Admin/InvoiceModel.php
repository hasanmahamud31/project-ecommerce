<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model {

    protected $table = 'invoice';
    protected $fillable = ['order_id','product_id','receive_quantity','admin_id','comment','status','del_status'];

}
