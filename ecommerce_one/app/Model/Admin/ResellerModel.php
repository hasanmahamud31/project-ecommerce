<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ResellerModel extends Model
{
    protected $table='resellers';
    protected $fillable=['admin_id','name','mobile','image','NID','present_address','permanent_address','reseller_joining_date','status'];
      
    
    
    public function users() {
        return $this->hasOne('User');
        
    }
}
