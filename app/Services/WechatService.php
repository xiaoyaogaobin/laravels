<?php

namespace App\Services;


use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Rule;
use Houdunwang\WeChat\WeChat;

class WechatService extends Controller{

    public function __construct()
    {
            //获取 配置项信息
        $config = config('hd_wechat');
        //执行第三方框架，把配置项发信息布到第三方
        WeChat::config($config);
            // 调用第三方发放跟微信打通
        WeChat::valid();

    }
    // 加载模版 全部公用
    public function ruleView($rule_id = 0){
    // 打印这个数据
       $rule=  Rule::find($rule_id);
//       dd($rule);
            //的到关键表里面的值
//        dd($rule->keyword()->select('key')->get()->toarray());
       $ruleDate = [
           // 因为首页加载也是这个模版 ，需要些判断
         'name'=>$rule?$rule['name']:'',
           'keywords'=>$rule?$rule->keyword()->select('key')->get()->toarray():[]
       ];
        // 引用模版
        return view('whecat.layouts.rule',compact('ruleDate'));
    }
    //添加数据
    public function ruleStore($type){
        // 得到是一个数组，需要转换jesn
        $post = request()->all();
        // 把jeson  数据转换为php 变量
        $rule = json_decode($post['rule'],true);
        // 判断数据

        \Validator::make($rule,[
            'name'=>'required'
        ],[
            'name.required'=>'规则不能为空'
        ])->validate();

        // 循环拿出每一个数组插进数据库

//        dd($rule);
        //插入数据库
       $ruleModel = Rule::create(['name'=>$post['name'],'type'=>$type]);

        foreach($rule['keywords'] as $value){
            // 循环插入数据

            Keyword::create([
                    'rule_id'=>$ruleModel['id'],
                    'key'=>$value['key']
                            ]);
        }

        return $ruleModel;

    }
    // 更改数据
    public function ruleUpdate($rule_id){
        // 获得标题数据
        $rule = Rule::find($rule_id);
        //获得接受过来数据
        $post= request()->all();
        // 把json 数据转换为 php 变量
        $ruleDate = json_decode($post['rule'],true);

        // 往数据库添加新的name数据
//        dd($ruleDate['name']);
        $rule->update(['name'=>$ruleDate['name']]);
        // 清空原先的数据
//        dd($rule->keyword()->get()->toarray());
        $rule->keyword()->delete();
//        dd($ruleDate);
        // 获得 keyword数据，循环往里面添加数据
        foreach($ruleDate['keywords'] as $v){
            Keyword::create([
                'rule_id'=>$rule_id,
                'key'=>$v['key']
                            ]);
        }

    }
}