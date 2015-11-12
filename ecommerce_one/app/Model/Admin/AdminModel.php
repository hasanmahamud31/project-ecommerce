<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table='admins';
    protected $fillable=['name','mobile','image'];
      
    
    
    public function users() {
        return $this->hasOne('User');
        
    }
    public function staff() {
        return $this->hasOne('StaffModel');        
    }
    public function reseller() {
        return $this->hasOne('ResellerModel');        
    }
    public function user() {
        return $this->hasOne('UserModel');        
    }
}
