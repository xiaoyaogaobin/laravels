<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\PermissionServiceProvider;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //权限列表展示
    public function index(){
       $modules= Module::all();
       $buttons= [];
        return view('role.permission.index',compact('modules','buttons'));


    }
    //清空缓存
    public function forgetPermissionCache(){
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success','缓存清除成功');

    }

}

