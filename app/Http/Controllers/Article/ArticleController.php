<?php

namespace App\Http\Controllers\Article;

use App\Http\Requests\ArtcileRequest;
use App\Models\Article;
use App\Models\Gategory;
use App\Models\Slide;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\Driver\Exception\SSLConnectionException;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            //'only'=>['create','store','edit','update','destroy'],
            'except'=>['index','show']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {   // 获得栏目id
        $type = $request->query('gategory');
        $id = $request->query('id');
        //栏目数据
        $gategorys = Gategory::all();
        $articles = Article::latest();
//        dd(1);
        //幻灯片数据
        $slides =  Slide::all();

        if($type){

            $articles = $articles->where('category_id',$type);
        }
        if($id){

            $articles = $articles->where('user_id',$id);
        }

        $articles =$articles->paginate(6);

//        dd($article);

      return view('home.article.index',compact('articles','gategorys','slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //接受 原先表的数据
        $gategorie = Gategory::all();
//        dd($gategorie);
        //
        return view('home.article.create',compact('gategorie'));
    }

    public function store(ArtcileRequest $request,Article $article)
    {
        //
//        dump($article->all()->toArray());
//        获得当前用户id
//        dd(auth()->id());
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->content = $request['content'];
        $article->background = $request['background'];
        $article->user_id = auth()->id();
        $article->save();
        return redirect()->route('article.article.index')->with('success','添加成功');


//        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // 旧的数据
//        dd($article);

        return view('home.article.show',compact('article'));
//        dump($article->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update',$article);
        $gategorie = Gategory::all();
//        dump($article->toArray());
        return view('home.article.edit',compact('article','gategorie'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
//        dump($article->toArray());
//
//        dd($request->toArray());
        $this->authorize('update',$article);
        $article->title = $request->title;
        $article->category_id =    $request->category_id;
        $article->content = $article->content;
        $article->background = $request['background'];
        $article->save();
        return redirect()->route('article.article.index')->with('success','修改成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete',$article);
        $article->delete();
        return redirect()->back()->with('success','删除成功');
    }


}
