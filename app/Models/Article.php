<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

class Article extends Model
{

    use LogsActivity,Searchable;
    protected $fillable = ['title','content','id'];
    //如果需要记录所有$fillable设置的填充属性，可以使用
    protected static $logFillable = true;
    protected static $recordEvents = ['created','updated'];
    //自定义日志名称
    protected static $logName = 'article';

    // 用户关联
    public  function user(){
        return $this->belongsTo(User::class);
    }
    public  function  gate(){

        return $this->belongsTo(Gategory::class,'category_id','id');
    }
    //定义多态
    public  function zan(){

        return $this->morphMany(Zan::class,'zan');
    }
    public  function collection(){


        return $this->morphMany(Collection::class,'collection');

    }

}
