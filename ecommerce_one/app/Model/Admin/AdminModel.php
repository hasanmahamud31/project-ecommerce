<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    /**
     * table name for Admin Model
     * 
     * @var string
     */
    protected $table = 'admins';
    /**
     * fillable field which will be inserted
     * 
     * @var array
     */
    protected $fillable = ['name', 'mobile', 'image'];
    /**
     * 
     * @return
     */
    public function users() {
        return $this->hasOne('User');
    }
    /**
     * 
     * @return type
     */
    public function staff() {
        return $this->hasOne('StaffModel');        
    }
    /**
     * 
     * @return type
     */
    public function reseller() {
        return $this->hasOne('ResellerModel');        
    }
    /**
     * 
     * @return type
     */
    public function user() {
        return $this->hasOne('UserModel');        
    }
}
