<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Gategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categorys = Gategory::all();
        //分页
        $categorys = Gategory::paginate(10);

        return view('admin.category.index',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
//    {  dd(1);
//        dd($request);
        //
//        dd($request->all());
//        dd();
       Gategory::create($request->all());

        return redirect()->route('admin.category.index')->with('success','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gategory  $gategory
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gategory  $gategorysee
     * @return \Illuminate\Http\Response
     */
    public function edit(Gategory $category)
    {

        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gategory  $gategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gategory $category)
    {       // 接受来的数据
//                dd($request->all());
//                dd($category);
        $category->update($request->all());
            return redirect()->route('admin.category.index')->with('success','修改成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gategory  $gategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gategory $category)
    {

        $category->delete();
        return redirect()->route('admin.category.index')->with('success','操作成功');
    }
}
