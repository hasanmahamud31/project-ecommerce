<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class StaffModel extends Model
{
    protected $table='staffs';
    protected $fillable=['admin_id','name','mobile','image','NID','present_address','permanent_address','staff_joining_date','status'];
      
    
    
    public function users() {
        return $this->hasOne('User');
        
    }
}
