<?php

namespace App\Http\Controllers\Wechat;
// 链接通信
use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Rule;
use App\Modles\ResponseBase;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;


class ApiController extends Controller{
    //http://www.moko001.com/wechat/Api/wechat
    // 微信通信接口
    public function handler(WechatService $wechatService){


        //消息管理管理
        $instance =WeChat::instance('message');

        //判断是否是关注事件
        if ($instance->isSubscribeEvent())
        {
            $content = ResponseBase::find(1);

            //向用户回复消息
           return $instance->text($content['data']['subscribe']);

        }

        //判断是否是文本消息
        if ($instance->isTextMsg())
        {
            //获取粉丝发送来的消息内容
            $content = $instance->Content;
            //根据消息内容去关键词表查找数据
            return $this->keyWordToFindResponse($instance,$content);
        }
        //点击管理模块
        $buttonInstance = WeChat::instance('button');
        //关注用户扫描二维码事件
        if ($buttonInstance->isClickEvent()) {
            //获取消息内容
            $message = $buttonInstance->getMessage();
            //向用户回复消息
//            return WeChat::instance('message')->text("点击了菜单,{$message->EventKey}");
            return $this->keyWordToFindResponse($instance,$message->EventKey);

        }


    }

    private function keyWordToFindResponse($instance,$content){

        if($keyword = Keyword::where('key',$content)->first()){
            //通过关键词模型关联 rule
            $rule = $keyword->rule;
            //如果能找到对应的关键词
            if ($rule['type']=='text'){
                //获取所有对应的文本回复
                $responseContent = json_decode($rule->responseText->pluck('content')->toArray()[0],true);
                //从所有回复内容中每次随机一个
                $content = array_random($responseContent)['content'];
                //回复粉丝
                return $instance->text($content);
            }elseif($rule['type']=='news'){
                //图文消息
                $news = json_decode($rule->responseNews->toArray()[0]['data'],true);
                return $instance->news([$news]);
            }




        }

        //当匹配不到关键词的时候 执行默认回复
        $content = ResponseBase::find(1);
        return $instance->text($content['data']['default']);

    }


}