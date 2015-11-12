<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table='customer';
    protected $fillable=['admin_id','name','mobile','present_address','image','status'];
      
    
    
    public function users() {
        return $this->hasOne('User');
        
    }
}
