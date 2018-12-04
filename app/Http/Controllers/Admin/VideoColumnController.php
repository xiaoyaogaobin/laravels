<?php

namespace App\Http\Controllers\Admin;

use App\Models\VideoColumn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoColumnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videpcolumns = VideoColumn::paginate(10);
        return view('admin.video.index',compact('videpcolumns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(1);
        //
//        dd($request->toArray());
        VideoColumn::create($request->toArray());
        return redirect()->route('admin.column.index')->with('success','添加成功');




    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoColumn  $videoColumn
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoColumn $column)
    {
        //
        dd($column);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VideoColumn  $videoColumn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoColumn $videoColumn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoColumn  $videoColumn
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

//        $videoColumn->delete();
//        return redirect()->route('admin.column.index')->with('success','删除成功');
    }
}
