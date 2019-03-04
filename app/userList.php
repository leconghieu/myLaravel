<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userList extends Model
{
    protected $table = 'user_lists';
    public $fillable = ['name', 'password', 'email'];
    public $timestamps = false;
}
