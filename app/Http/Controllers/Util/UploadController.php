<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
class UploadController extends Controller
{
    //处理上传
    public function uploader(Request $request)
    {

//        return dd($request);
//
//        $this->validate($request, [
//            'file' => 'dimensions:min_width=2500,min_height=5000'
//        ],[
//            'file.dimensions'=>'图片知促不合格',
//        100]100
//        0=>200
//        1=>100


//        ]);
        $res = explode('|',hd_config('upload.maxnum'));
        $validator = Validator::make($request->all(), [

            'file' => "Dimensions:max_width={$res[0]},max_height={$res[1]}",
        ],[
            'file.Dimensions'=>'图片尺寸不合格',
        ]);

        if ($validator->fails()) {
           $errors = $validator->errors();
            return ['message' =>$errors->first('file'), 'code' => 403];
        }

//    dd($request->all());
//dd($_FILES);
//        来查看上传表单的name
        // 得到处理的类型

        $file = $request->file('file');
//        dd($_FILES);
        // 判断字节大小
        $this->checkSize($file);
        //判断图片类型
        $this->checkType($file);
//$path = $request->file('上传表单name名')->store('上传文件存储目录','指定磁盘(对应config/filesystem.php中disk)');
        if ($file){
            $path = $file->store('attachment','attachment');
            auth()->user()->attachment()->create(
                [

                    'name ' => $file->getClientOriginalName(),
                    'path' => url($path)
                ]);
        }

        return ['file' => url($path),'code' => 0];


    }

    // 判断字节大小
    private function checkSize($file)
    {
        if ($file->getSize() > hd_config('upload.size')){
            // 抛出异常
            throw new UploadException('文件超过大小');

        }

    }

    // 判断图片类型
    private function checkType($file)
    {
        if (!in_array(strtolower($file->getClientOriginalExtension()),explode('|',hd_config('upload.type')))){
            //return  ['message' =>'类型不允许', 'code' => 403];
            throw new UploadException('类型不允许');
        }

    }


    //获取文件上传的地址
    public function filesLists()
    {
        $files = auth()->user()->attachment()->paginate(10);
//        dd($files)10
        $date = [];
        foreach($files as $file){
            $date[] = [
                'path' => $file['path'],
                'url' => $file['path'],
            ];
        }
//            dd($date);
        return [
            'data' => $date,
            'page' => $files->links() . '',//这里一定要注意分页后面拼接一个空字符串
            'code' => 0
        ];
    }

}
