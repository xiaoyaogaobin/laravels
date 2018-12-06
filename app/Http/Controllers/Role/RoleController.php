<?php

namespace App\Http\Controllers\Role;


use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
      return view('role.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('role.role.create');
    }

     public function  show(Role $role){
         $modules =  Module::all();
//         dd($modules->toArray());

         return view('role.role.set_permission',compact('role','modules'));


     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Role $role)
    {
        //
//        dd($role->all());
        Role::create($request->all());
        return redirect()->route('role.role.index')->with('success','角色添加成功');
    }


    public function edit(Role $role)
    {
//        dd($role->toArray());
        return view('role.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //

        $role->update($request->all());
        return redirect()->route('role.role.index')->with('success','角色修改成功');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)

    {
        $role->delete();
        return back()->with('success','删除成功');

        //
    }
    //接受传来的权限写进数据库
    public function setRolePermission(Role $role, Request $request){
//        dd($request->all());
        // 给角色添加权限
        $role->syncPermissions($request->permissions);
        // 返回提示
        return back()->with('success','保存成功');
    }
}
