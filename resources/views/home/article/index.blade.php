@extends('home.layouts.message')
@section('content')
    {{--幻灯片--}}
    <div id="focus-banner">
        <ul id="focus-banner-list">
            @foreach($slides as $slide)
                <li>
                    <a href="{{$slide->website}}" class="focus-banner-img">
                        <img src="{{$slide->picture}}" alt="">

                        <div class="focus-banner-text">
                            <p>{{$slide->introduce}}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>

        <a href="javascript:;" id="prev-img" class="focus-handle"></a>
        <a href="javascript:;" id="next-img" class="focus-handle"></a>
        <ul id="focus-bubble"></ul>
    </div>

    {{--幻灯片结束--}}
    <div class="main-content">

        <!-- HEADER -->
        <div class="header" style="position: relative;
    z-index: 999;">

            <!-- Image -->


            <div class="container-fluid">

                <!-- Body -->

                <div class="header-body mt--5 mt-md--6">
                    <div class="row align-items-end">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar avatar-xxl header-avatar-top">
                                @auth()
                                <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle border border-body">
                            @endauth
                            </div>

                        </div>
                        <div class="col mb-3 ml--3 ml-md--2">

                            <!-- Pretitle -->


                            <!-- Title -->
                            <h1 class="header-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        @auth()
                                {{auth()->user()->name}}
                                        @endauth
                                    </font></font></h1>

                        </div>
                        <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">

                            <!-- Button -->
                            <a href="{{route('article.article.create')}}" class="btn btn-primary d-block d-md-inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        添加文章
                                    </font></font></a>
                            @auth()
                            <a href="{{route('article.article.index',['id'=>auth()->user()])}}" class="btn btn-primary d-block d-md-inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        我的文章
                                    </font></font></a>
@endauth
                        </div>
                    </div> <!-- / .row -->
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">

                                <li class="nav-item">
                                    <a href="{{route('article.article.index')}}" class="nav-link active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                所有文章
                                            </font></font></a>
                                </li>
                                @foreach($gategorys as $gategory)
                                <li class="nav-item">
                                    <a href="{{route('article.article.index',['gategory'=>$gategory->id])}}" class="nav-link "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                {{$gategory->title}}
                                            </font></font></a>

                                </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div> <!-- / .header-body -->

            </div>
        </div>

        <!-- CONTENT -->
        <div class="container-fluid">
            <div class="row">
                @foreach($articles as $article)
                <div class="col-12 col-md-6 col-xl-4">

                    <!-- Card -->
                    <div class="card">

                        @if(!$article->background)
                        <img src="{{asset('org/disk/assets')}}/img/covers/profile-cover-2.jpg" alt="..." class="card-img-top">
                        @else
                        <img src="{{$article->background}}" alt="..." class="card-img-top" height="200px">
@endif
                        <div class="card-body text-center">

                            <a href="{{route('member.user.show',$article->user)}}" class="avatar avatar-xl card-avatar card-avatar-top">
                                <img src="{{$article->user->icon}}" class="avatar-img rounded-circle border border-white" alt="...">
                            </a>

                            <h2 class="card-title">
                                <a href="{{route('article.article.show',$article)}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$article->title}}</font></font></a>
                            </h2>

                            <p class="card-text text-muted">
                                <small><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                            所属栏目：{{$article->gate->title}}
                                        </font></font></small>
                            </p>

                            <p class="card-text">
                                @can('update',$article)
                  <a href="{{route('article.article.edit',$article)}}" class="badge badge-soft-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    修改
                   </font></font></a>
                                @endcan
                                    @can('delete',$article)
                                <button onclick="del(this)" class="badge badge-soft-secondary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    删除
                  </font></font></button>
                            @endcan
                            <form action="{{route('article.article.destroy',$article)}}" method="post" id="del">
                                @csrf @method('DELETE')
                            </form>
                            </p>

                            <hr>

                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">

                                    <small>
                                        <span class="text-success"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">●</font></font></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$article->created_at->diffForHumans()}}
                                            </font></font></small>

                                </div>
                                <div class="col-auto">

                                    <a href="#!" class="btn btn-sm btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                {{$article->user->name}}
                                            </font></font></a>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                @endforeach
            </div>
        </div> <!-- / .container-fluid -->

    </div>
    <div class="container">
        <div style="width: 500px;height: auto;margin: 0 auto">
            {{$articles->appends(['gategory' => Request::query('gategory')])->links()}}</div>
    </div>
@endsection

<script>
    function del(obj){
    require(['hdjs','bootstrap'], function (hdjs) {
        hdjs.confirm('确定删除吗?', function () {
            $('#del').submit();
        })
    })}
</script>