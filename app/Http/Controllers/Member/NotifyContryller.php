<?php

namespace App\Http\Controllers\Member;

use App\Models\Slide;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\DatabaseNotification;

class NotifyContryller extends Controller
{
    public function index(User $user){
        $articles= [];
        //isMain
//        $this->authorize('isMine',$user);
        //列出所有通知
       $slides =  Slide::all();

        $notifications = $user->notifications()->paginate(6);
        return view('member.notify.index',compact('user','notifications','slides'));
    }
    public function show(DatabaseNotification $notify){
        $notify->markAsRead();
        //跳转到文章详情页,页面自动滚动到对应的评论
        return redirect($notify['data']['link']);
    }
}
