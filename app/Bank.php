<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $fillable = [
        'name', 'fullname', 'link','intro','logo','created_at'
    ];
    public $timestamps = true;
}
