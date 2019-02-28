<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    protected $table = 'loaitin';
    public $timeStamps = false;
    public $fillable = ['maloai', 'tenloai', 'status'];
}
