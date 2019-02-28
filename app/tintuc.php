<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    protected $table = 'tintuc';
    public $timeStamps = false;
    public $fillable = ['tieude', 'tomtat', 'maloai', 'noidung'];
}
