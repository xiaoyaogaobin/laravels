<<<<<<< Updated upstream
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ul class="list-group list-group-lg list-group-flush list my--4">
    @foreach($articles as $article)
        <li class="list-group-item px-0">

            <div class="row align-items-center">
                <div class="col-auto">
                    <!-- Avatar -->
                    <a href="" class="avatar avatar-sm">
                        <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded">
                    </a>

                </div>
                <div class="col ml--2">

                    <!-- Title -->
                    <h4 class="card-title mb-1 name">
                        <a href=""></a>
                    </h4>

                    <p class="card-text small mb-1">
                        <a href="" class="text-secondary mr-2">
                            <i class="fa fa-user-circle" aria-hidden="true"></i> {{$article->user->name}}
                        </a>
                        {{--Carbon 处理时间库--}}
                        <i class="fa fa-clock-o" aria-hidden="true"></i> {{$article->created_at->diffForHumans()}}

                        <a href="http://www.houdunren.com/edu/topics_1.html" class="text-secondary ml-2">
                            <i class="fa fa-folder-o" aria-hidden="true"></i> {{$article->gate->title}}</a>
                    </p>

                </div>
                <div class="col-auto">

                    <!-- Dropdown -->
                    <div class="dropdown">
                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-more-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="" class="dropdown-item">
                                查看详情
                            </a>
                            @can('update',$article)
                                <a href="" class="dropdown-item">
                                    编辑
                                </a>
                            @endcan
                            @can('delete',$article)
                                <a href="javascript:;" onclick="del(this)" class="dropdown-item">
                                    删除
                                </a>
                                <form action="" method="post">
                                    @csrf @method('DELETE')
                                </form>
                            @endcan
                        </div>
                    </div>

                </div>
            </div> <!-- / .row -->

        </li>
    @endforeach
</ul>
</body>
</html>
=======
@extends('home.layouts.message')
@section('content')
    <div class="main-content">
        <div class="container mt-4">
            <div class="alert alert-primary">
                你一共搜索了{{$articles->count()}}条数据

                <!-- Close -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>

            </div>

            <div class="row">
                <div class="col-12">

                    <div class=" ">
                        <div class="row">
                            <div class="col-12">
                                <!-- Files -->
                                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">

                                    {{--<div class="col-auto">--}}

                                    {{--<!-- Dropdown -->--}}
                                    {{--<div class="dropdown">--}}

                                    {{--<!-- Toggle -->--}}
                                    {{--<a href="#!" class="small text-muted dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--筛选--}}
                                    {{--</a>--}}

                                    {{--<!-- Menu -->--}}
                                    {{--<div class="dropdown-menu">--}}
                                    {{--@foreach($categories as $category)--}}
                                    {{--<a class="dropdown-item sort" data-sort="name" href="{{route('home.search',['wd'=>Request::query('wd'),'category'=>$category['id']])}}">--}}
                                    {{--{{$category['title']}}--}}
                                    {{--</a>--}}
                                    {{--@endforeach--}}
                                    {{--</div>--}}

                                    {{--</div>--}}

                                    {{--</div>--}}
                                    <div class="card-body">

                                        <!-- List group -->
                                        <div class="list-group list-group-flush ">
                                            @if($articles->count() == 0)

                                                <div class="col-auto text-center">

                                                    <button href="#!" class="btn btn-sm btn-primary">
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                抱歉没有搜索到你的数据
                                                            </font></font></button>

                                                </div>
                                            @else
                                                <ul class="list-group list-group-lg list-group-flush list ">
                                                @foreach($articles as $article)
                                                    {{--{{$article}}--}}

                                                                                                                                                                                                                                                              <div class="list-group-item px-0">
                                                        <li class="list-group-item px-0">

                                                            <div class="row align-items-center">
                                                                <div class="col-auto">

                                                                    <!-- Avatar -->
                                                                    <a href="{{route('member.user.show',$article->user)}}" class="avatar avatar-lg">
                                                                        <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded">
                                                                    </a>

                                                                </div>
                                                                <div class="col ml--2">

                                                                    <!-- Title -->
                                                                    <h4 class="card-title mb-1 name">
                                                                        <a href="#!"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$article->title}}</font></font></a>
                                                                    </h4>

                                                                    <!-- Text -->
                                                                    <p class="card-text small text-muted mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                {{$article->gate->title}}
                                                                            </font></font></p>

                                                                    <!-- Time -->
                                                                    <p class="card-text small text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                               由 <span style="color: red">[{{$article->user->name}}]</span>发表 </font></font><time datetime="2018-01-03"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$article->created_at->diffForHumans()}}</font></font></time>
                                                                    </p>

                                                                </div>
                                                                <div class="col-auto">

                                                                    <!-- Button -->
                                                                    <a href="{{route('member.user.show',$article->user)}}" class="btn btn-sm btn-danger d-none d-md-inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                查看
                                                                            </font></font></a>

                                                                </div>
                                                                <div class="col-auto">

                                                                    <!-- Dropdown -->
                                                                    <div class="dropdown">
                                                                        <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <i class="fe fe-more-vertical"></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 25px, 0px);">

                                                                            @can('update',$article)
                                                                            <a href="{{route('article.article.update',$article)}}" class="dropdown-item"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                                        修改</font></font></a>
                                                                                @endcan
                                                                            <font style="vertical-align: inherit;">
                                                                                @can('delete',$article)
                                                                                <a href="javascript:;"  onclick="del(this)"class="dropdown-item"><font style="vertical-align: inherit;">
                                                                                        删除
                                                                                    </font></a>
                                                                                @endcan
                                                                                <form action="{{route('article.article.destroy',$article)}}" method="post">
                                                                                    @csrf @method('DELETE')
                                                                                </form>
                                                                            </font>

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div> <!-- / .row -->
                                                        </div>
                                                        </li>
                                                    @endforeach

                                                    @endif

                                                </ul>

                                    </div>
                                    <!-- List -->
                                    {{$articles->appends(['wd' => Request::query('wd')])->links()}}
                                </div>


                            </div>

                        </div>


                    </div> <!-- / .main-content -->


@endsection
@push('js')
                            <script>
                                function del(obj) {
                                    require(['https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js'], function (swal) {
                                        swal("确定删除?", {
                                            icon: 'warning',
                                            buttons: {
                                                cancel: "取消",
                                                defeat: '确定',
                                            },
                                        }).then((value) => {
                                            switch (value) {
                                                case "defeat":
                                                    $(obj).next('form').submit();
                                                    break;
                                                default:

                                            }
                                        });
                                    })
                                }
                            </script>
    @endpush
>>>>>>> Stashed changes
