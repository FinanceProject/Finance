<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';
    protected $fillable = [
         'emaill', 'password','fullname','level','number_phone','avatar','bank_id'
    ];
    protected $hidden = ['password'];
    public $timestamps = true;



    public  function bank(){
        return $this->belongsTo("App\Bank");
    }

    public  function category_request(){
        return $this->belongsToMany("App\CategoryRequest");
    }
}
