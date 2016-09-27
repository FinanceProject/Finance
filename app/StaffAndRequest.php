<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffAndRequest extends Model
{
    protected $table = 'staff_and_requests';
    protected $fillable = [
        'staff_id', 'category_request_id'
    ];
    public $timestamps = false;
}
