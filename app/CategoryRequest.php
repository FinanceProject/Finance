<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRequest extends Model
{
    protected $table = 'category_requests';
    protected $fillable = [
        'name'
    ];
    public $timestamps = false;
    public   function staff(){
        return $this->belongsToMany("App\Staff");
    }
    public function request(){
        return $this->hasMany("App\Request");
    }
}
