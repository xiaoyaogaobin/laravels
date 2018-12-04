<?php

namespace App\Http\Controllers\Config;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['edit','update'],
        ]);
    }

    // 加载首页
    public  function  edit($name){

        $config = Config::firstOrNew(
            ['name'=>$name]
        );
//            dd($config);
        return view('admin.config.config_'.$name,compact('name','config'));

    }
    // 执行更改
    public  function  upload($name,Request $request){
//        dump($name);
//        dd($request->all());

        // 执行更新或者添加
        Config::updateOrCreate(
            ['name'=>$name],
            ['name'=>$name,'data'=>$request->all()]);
          hd_edit_env($request->all());
//        dd($request->all());
        return back()->with('success','更新配置成功');
    }
}
