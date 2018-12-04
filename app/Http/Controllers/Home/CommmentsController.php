<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommmentsController extends Controller
{
    // 获取指定文章的所有评论数据
    public function index(Request $request,Comments $comments)
    {
//   dd($request);

//        dd($comments->all());
       $commentsd = $comments->with('user')->where('article_id',$request->article_id)->get();

       foreach($commentsd as $comments){
           $comments->num = $comments->zan->count();
       }

//      for dd($commentsd);
//      $commentsd =$commentsd::paginate(2);
//       dd($commentsd->toArray());
        //分页
//        $commentsd =$commentsd::pa
        //
        return ['code'=>1,'message'=>'','comments'=>$commentsd];

    }

    //添加评论
    public function store(Request $request,Comments $comments)
    {
        //
//        dd($request);
        $comments->article_id = $request->article_id;
        $comments->user_id = auth()->id();
        $comments['content'] = $request['content'];
        $comments->save();
        // 会管理user 表 把用户直接关联进去

        $comments = $comments->with('user')->find($comments->id);

        $comments->num = $comments->zan->count();

        return ['code'=>1,'message'=>'','comment'=>$comments];
//        dd($comments);


    }




}
