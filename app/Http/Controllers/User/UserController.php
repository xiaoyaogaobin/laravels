<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        //调用中间件，保护登录注册（已经登录用户不允许再访问登录注册）
        $this->middleware('guest',[
            'only'=>['login','login_form','resighter','store','logout','rest'],
        ]);
    }

    // 登录模版
    public function login()
    {
        return view('user.login');
    }

    // 登录页面接受处理数据
    public function login_form(Request $request)
    {

//        dd($request->toArray());
        $this->validate(
            $request,[
            'email' => 'required',
            'password' => 'required|min:3'
        ],[
                'email.email' => '手机不能为空',
                'password.required' => '请输入登录密码',
                'password.min' => '密码不得少于3位置'
            ]

        );
        $num = $request->only('email','password');
//        dd($num);
        //$request->remember 七天登录 记住我
        if (\Auth::attempt($num,$request->remember)){

            if ($request->form){
                return redirect($request->form)->with('success','登录成功');

            }else{

                return redirect()->route('home')->with('success','登录成功');

            }
        }
        return redirect()->back()->with('danger','账号密码不匹配');


    }

    // 注册页面
    public function resighter()
    {
        // 引入注册页面
        return view('user.regither');
    }

// 用户提交注册 验证
    public function store(UserRequest $request)
    {      //
        $data = $request->all();
        // 把密码加密存储到数据库里面
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        $num = $request->only('email','password');
//        dd($num);
        if (\Auth::attempt($num)){
            return redirect()->route('home')->with('success','登录成功');
        }
        return redirect()->route('home')->with('success','注册成功');
    }

// 用户退出登录
    public function logouts()
    {
        \Auth::logout();
        return redirect()->route('home');
    }

    // 用户重置密码模版

    public function rest()
    {
        return view('user.restpassword');
    }

    // 用户重置密码接受处理
    public function rest_from(UserRest $request)
    {
//        dd($request);
        $user = User::where('email',$request->email)->first();
        if ($user){
            $user->password = bcrypt($request->password);
            $user->save();
            // 成功跳转链接
            return redirect()->route('userog.login')->with('success','密码重置成功');

        }
        return redirect()->back()->with('danger','该邮箱未注册');
    }


}
