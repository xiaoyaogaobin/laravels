<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionController extends Controller
{
    public function __construct()
    {
        // 拦截
        $this->middleware('auth',[
            'only'=>['collection']
        ]);
    }

    //收藏
   public function collection(Request $request){
//        dd($request->all());
       $type = $request->query('type');
       $id = $request->query('id');
       //查找类型
       $class = 'App\Models\\'.ucfirst($type);
//        dd($class);

       $model = $class::find($id);
//        dd($model);
//        dd($model->collection->all());
       if ($collection= $model->collection->where('user_id',auth()->id())->first()){
           $collection->delete();
       }else{
           $model->collection()->create(['user_id'=>auth()->id()]);
       }

//       dd($model);



       return back();
   }

}
