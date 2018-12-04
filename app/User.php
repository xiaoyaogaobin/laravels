<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Attachment;
use App\Models\Collection;
use App\Models\Zan;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at','icon'
    ];
//获取用户 Icon
    public function getIconAttribute( $key )
    {
        //dd($key);
        return $key?:asset('org/images/user.jpg');
    }
    /**
     * The attributes that should be hidden for arrays
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function attachment(){

        return $this->hasMany(Attachment::class);
    }
    // 获取制定用户粉丝
    public function fans(){

        return $this->belongsToMany(User::class,'followers','user_id','following_id');
    }
    //获取关注的人
    public function following(){

        return $this->belongsToMany(User::class,'followers','following_id','user_id');
    }
    // 获取点赞的人
    public  function zan(){
        return $this->hasMany(Zan::class);
    }
    // 取出多态
    public  function collection(){
        return $this->hasMany(Collection::class);
    }
    //用户关联文章
    public function article()
    {
         return $this->hasMany(Article::class);

    }
    // 用户排列信息
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('read_at', 'asc')->orderBy('created_at', 'desc');
    }

}
