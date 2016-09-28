<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
        'fullname', 'number_phone', 'email','address','city','gender','birthday','job','income'
    ];
    public $timestamps = true;
    function request(){
        return $this->hasMany("App\Request");
    }
}
