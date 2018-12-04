<?php

namespace App\Http\Controllers\Wechat;

use App\Models\Button;
use App\Services\WechatService;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons=  Button::all();

        //首页渲染
        return view('whecat.index',compact('buttons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('whecat.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        Button::create($request->all());
        return redirect()->route('wechat.button.index')->with('success','添加成功');
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function edit(Button $button)
    {
        //
        return view('whecat.edit',compact('button'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Button $button)
    {
        //
        $button->update($request->all());
        $data['status'] = 0;
        $button->update($data);
        return redirect()->route('wechat.button.index')->with('success','编辑成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Button  $button
     * @return \Illuminate\Http\Response
     */
    public function destroy(Button $button)
    {
        //
        $button->delete();
        return redirect()->route('wechat.button.index')->with('success','删除成功');
    }

    //推送菜单之前 先实例化WechatService,该类构造方法有微信通信验证
  public function  push(Button $button,WechatService $wechatService){
        // 的到数据需要需要转jeson
      $menu = json_decode($button['data'],true);
      // 定义自定菜单推送
      $res= WeChat::instance('button')->create($menu);

    if ($res['errcode']==0){
        //将当前菜单数据表 status 修改1,
    $button->update(['status'=>1]);
        //将当前菜单数据表 status ,其余的改为0
    Button::where('id','!=',$button->id)->update(['status'=>0]);

        return redirect()->route('wechat.button.index')->with('success','启用成功');
    }else{
        return back()->with('danger',$res['errcode']);
    }

  }

}
