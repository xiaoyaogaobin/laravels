<?php

namespace App\Http\Controllers\Home;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class DynamicController extends Controller
{
    //
    public function index(){

        $activities = Activity::latest()->paginate(10);
        $slides = Slide::all();
       return view('dynamic.index',compact('activities','slides'));
    }
}

