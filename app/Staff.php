<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = [
         'emaill', 'password','fullname','level','number_phone','avatar','bank_id','category_request_id'
    ];
    protected $hidden = ['password'];
    public $timestamps = true;
}
