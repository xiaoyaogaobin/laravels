<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseNews;
use App\Models\ResponseText;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        hdHasRole('Wechat-response-news');
        $fields = ResponseNews::paginate(10);

        return view('whecat.response_news.index',compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatService $wechatService)
    {
        hdHasRole('Wechat-response-news');
        $ruleView = $wechatService->ruleView();
//        dd($ruleView);
        //引入模版
        return view('whecat.response_news.create',compact('ruleView'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {
        hdHasRole('Wechat-response-news');
        \DB::beginTransaction();
        //调用wec 方法
        $rule = $wechatService->ruleStore('news');


        ResponseNews::create([
                                 'rule_id'=>$rule['id'],
                                 'data'=>$request['data'],

                             ]);

        // 事务提交
        \DB::commit();
        return redirect()->route('wechat.response_news.index')->with('success','操作成功');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseNews $responseNews,WechatService $wechatService)
    {
        hdHasRole('Wechat-response-news');
        $ruleView = $wechatService->ruleView($responseNews['rule_id']);
//        dd($responseNews);

        // 引入模版
        return view('whecat.response_news.edit',compact('ruleView','responseNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseNews $responseNews,WechatService $wechatService)
    {

        hdHasRole('Wechat-response-news');
        \DB::beginTransaction();
        //上面模版提交
        $wechatService->ruleUpdate($responseNews['rule_id']);
        // 回复内容提交
        $responseNews->update([
                                  'data'=>$request['data'],
                                  'rule_id'=>$responseNews['rule_id'],
                              ]);
        //提交事务
        \DB::commit();

//        return redirect()->route('whecat.response_text.index')->with('success','更新成功');
        return redirect()->route('wechat.response_news.index')->with('success','更新成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseNews  $responseNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseNews $responseNews)
    {
        hdHasRole('Wechat-response-news');
        $responseNews->rule()->delete();
        return redirect()->route('wechat.response_news.index')->with('success','删除成功');
        //
    }
}
