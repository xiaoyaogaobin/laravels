<?php

namespace App\Http\Controllers\Role;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //展示用户
    public function  index(){

//        dd(1);
        // 获得用户
        $users = User::paginate(6);
        return view('role.user.index',compact('users'));

    }

    // 给用户设置角色
    public function  create(User $user){
        // 当前用户
//        dd($user->toArray());
        // 获得角色表
       $roles =  Role::all();

        return view('role.user.create',compact('user','roles'));
    }
    //角色添加
    public function  userSetRoleStore(User $user,Request $request){
        // 获得当前用户

        $user->syncRoles($request->roles);
        return back()->with('success','设置成功');
    }


}
