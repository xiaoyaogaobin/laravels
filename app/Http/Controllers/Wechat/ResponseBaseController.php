<?php

namespace App\Http\Controllers\Wechat;

use App\Modles\ResponseBase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResponseBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        hdHasRole('Wechat-response-base');

        $field = ResponseBase::find(1);
        return view('whecat.response_base.index',compact('field'));
    }

    public function store(Request $request)
    {
        hdHasRole('Wechat-response-base');
        $responseBase = ResponseBase::firstOrNew(['id'=>1]);

        $responseBase['data'] = $request->all();
        $responseBase->save();
        return back()->with('success','操作成功');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Modles\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function show(ResponseBase $responseBase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modles\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseBase $responseBase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modles\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseBase $responseBase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modles\ResponseBase  $responseBase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseBase $responseBase)
    {
        //
    }
}
