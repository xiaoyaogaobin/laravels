<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //
    protected $fillable = ['name','type'];

    public function keyword(){
        return $this->hasMany(Keyword::class);
    }
    //文本回复
    public function responseText(){
        return $this->hasMany(ResponseText::class);
    }

    //图文回复
    public function responseNews(){
        return $this->hasMany(ResponseNews::class);
    }
}
