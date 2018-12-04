<?php

namespace App\Modles;

use Illuminate\Database\Eloquent\Model;

class ResponseBase extends Model
{
    //
    protected $fillable = ['id'];
    protected $casts = [
        'data'=>'array'
    ];
}
