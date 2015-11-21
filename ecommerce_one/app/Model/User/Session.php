<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use App\Model\User\Session;

class Session extends Model
{
    /**
     * the table name of Session Model
     * @var type string
     */
    protected $table = 'sessions';
    /**
     * this stop created at and update at coloum being inserted.
     * 
     * @var type boolean
     */
    protected $timestamps = false;
    /**
     * the massable insertion.
     * 
     * @var type array
     */
    protected $fillable = array('id', 'payload', 'last_activity');
    /**
     * sort cart data
     * 
     * @param type null
     */
    public static function addToCart($data){
        Session::create($data);
    }
    
}
