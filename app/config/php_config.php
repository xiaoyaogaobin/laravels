<?php
//助手函数


function hd_config($v){
//    echo $v;
    $info = explode('.',$v);
//    dd($info);
    static $cache = [];
    if(!$cache){
        //清空所有缓存
        //Cache::flush();
        //获取缓存中config_cache数据,如果数据不存在,那么会以第二个参数作为默认值
        $cache = Cache::get('config_cache',function(){
            return \App\Models\Config::pluck('data','name');
        });
    }
    return $cache[$info[0]][$info[1]];
}


//检测当前用户是否有制定角色
function hdHasRole($role)
{

    if (!auth()->user()->can($role)) {

        // 抛出异常
        throw  new \App\Exceptions\AuthException('你敢进打死你,丨');

    }
}