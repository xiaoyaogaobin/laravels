<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['make']
        ]);
    }


    //
    public  function  make(Request $request){
//            dd(1);
//        dd($request->all());
        // 接受 id 值 跟 type类型
        $type = $request->query('type');
        $id   = $request->query('id');
        //查找类型

        $class = 'App\Models\\'.ucfirst($type);
        // 获得当前点赞的文章
//        dd($class);
        $model = $class::find($id);
//        dd($model);
        // 判断

        if ($zan =$model->zan->where('user_id',auth()->id())->first() ){
            $zan->delete();
        }else{
//            dd(1);
            $model->zan()->create(['user_id'=>auth()->id()]);
        }


// 如果是ajax 就执行这个代码
        if ($request->ajax()){
//            dd(1);
            $newModel = $class::find($id);
//            dd($newModel);
            return ['code'=>1,'message'=>'','num'=>$newModel->zan->count()];
        }
        return back();
    }

}
