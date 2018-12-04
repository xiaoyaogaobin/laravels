<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\Models\Comments;
use App\Models\Slide;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Comment;

class UserController extends Controller
{
    public  function  __construct()
    {
        $this->middleware('auth',[
            'only'=>['edit','update','attention'],
        ]);
    }

    public function show(User $user )
    {
        //
       $slides=  Slide::all();

//        $rs = Article::all();
//        dd($rs);
        $articles = Article::latest()->where('user_id',$user->id)->paginate(5);
//        dd($articles);

        return view('member.user.show',compact('user','articles','slides'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user ,Request $request)

    {  $this->authorize('isMain',$user);
        $type = $request->query('type');
//        dd($type);
       $slides = Slide::all();
        return view('member.user.edit_'.$type,compact('user','slides'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('isMain',$user);
        //

//        dd($request->all());
        // 获得提交过来的数据
        $data = $request->all();

        // 调用策略

        // 开始进行判断


        $this->validate($request,[
            'password' =>'sometimes|required|min:3|confirmed',
            'name'=>'sometimes|required',
        ],[
                            'password.required'=>'请输入密码',
                            'password.min'=>'密码不得小于3位',
                            'password.confirmed'=>'两次密码不一致',
                            'name.required'=>'请输入昵称'
                        ]);
        //密码加密
        if($request->password){
            $data['password'] = bcrypt($data['password']);
        }
        //执行更新
        $user->update($data);
        return back()->with('success','操作成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

    public function attention(User $user){
        //dd($user);
        //auth()->user()->following()->toggle($user);
        $user->fans()->toggle(auth()->user());
        return back();
    }
    public function fans(User $user){

        //dd($user);
        $fansd = $user->fans()->paginate(6);
        //auth()->user()->following()->toggle($user);
        return view('member.user.fans',compact('user','fansd'));
    }
    public function follow(User $user ){
        $follows = $user->following()->paginate(6);
        //auth()->user()->following()->toggle($user);
        return view('member.user.follow',compact('user','follows'));
    }

    public function collection(User $user){

//        dd($user->collection);
//        foreach($user->collection as $v){
//           return $v->article->created_at;
//        }
//
//        die;
        // 获取所有文章
//        dd($collection);
            $collections = $user->collection()->latest()->paginate(5);
//            dd($collections->all());
//        dd($user->collection->article->all());
        //$collection =$article->where('article_id',collection_id)->paginate(6);

        return view('member.user.collection',compact('collection','collections','user'));
    }
    // 我的点赞
    public  function  my_zan(User $user,Request $request){
//        dd(1);
        $type = $request->query('type');

       $zans = $user->zan()->where('zan_type','App\Models\\'.$type)->latest()->paginate(2);
//        dd($zans->get());
        return view('member.user.my_zan_'.$type,compact('user','zans'));

    }
}

