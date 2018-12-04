<?php

namespace App\Http\Controllers\Wechat;

use App\Models\ResponseText;
use App\Services\WechatService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Description;

class ResponseTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $fields = ResponseText::paginate(10);

        return view('whecat.response_text.index',compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(WechatService $wechatService)
    {
        $ruleView = $wechatService->ruleView();
//        dd($ruleView);
        //引入模版
        return view('whecat.response_text.create',compact('ruleView'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,WechatService $wechatService)
    {
        //开启事务
        \DB::beginTransaction();
        //调用wec 方法
       $rule = $wechatService->ruleStore('text');

        ResponseText::create([
                                 'rule_id'=>$rule['id'],
                                 'content'=>$request['data'],

                             ]);

        // 事务提交
      \DB::commit();
       return redirect()->route('wechat.response_text.index')->with('success','操作成功');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseText $responseText,WechatService $wechatService)
    {
        $ruleView = $wechatService->ruleView($responseText['rule_id']);

        // 引入模版
        return view('whecat.response_text.edit',compact('ruleView','responseText'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseText $responseText,WechatService $wechatService)
    {
//        dd($responseText->toArray());
        //开启事务
        \DB::beginTransaction();
        //上面模版提交
        $wechatService->ruleUpdate($responseText['rule_id']);
        // 回复内容提交
        $responseText->update([
                                  'content'=>$request['data'],
                                  'rule_id'=>$responseText['rule_id'],
                              ]);
        //提交事务
        \DB::commit();

//        return redirect()->route('whecat.response_text.index')->with('success','更新成功');
        return redirect()->route('wechat.response_text.index')->with('success','更新成功');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseText  $responseText
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseText $responseText)
    {
        $responseText->rule()->delete();
        return redirect()->route('wechat.response_text.index')->with('success','删除成功');
        //
    }
}
