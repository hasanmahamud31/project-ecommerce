<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table='comments';
    protected $fillable=['comment','status'];
}
