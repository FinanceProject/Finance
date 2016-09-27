<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';
    protected $fillable = [
        'customer_id', 'category_request_id', 'content','status'
    ];
    public $timestamps = true;
}
