<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    // 允许那个字段写入数据库
    protected $fillable = ['name','data'];
    //cates 属性手册: Eloquent ORM--修改器
    protected $casts = [
        'data'=>'array',
    ];

}
