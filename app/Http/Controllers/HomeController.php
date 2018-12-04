<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public  function  index(Slide $slide){
        $slides = $slide->all();
//        dd($slides->toArray());
        return view('home.index',compact('slides'));
    }
    public function search(Request $request){
        $wd = $request->query('wd');
//        dd($wd);
        $articles = Article::search($wd)->paginate(5);
//        dd($articles);
        return view('home.search',compact('articles'));

    }
}
