<?php

namespace App\Observers;

use App\Models\Config;

class ConfigObserver
{
    //
    public function created(){
       $this->saveConfigToCache();
    }
    public function updated(){
//        dd(2)
        $this->saveConfigToCache();
    }
    // 缓存文件
    public function saveConfigToCache(){

        \Cache::forever('config_cache', Config::pluck('data','name'));
//        dd($res);
//        \Cache::forever('config_cache', Config::pluck('data','name'));

    }
}
