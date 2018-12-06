<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/flatpickr/dist/flatpickr.min.css">


@stack('css')
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/css/theme.min.css">
    <script src="{{asset('js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('js/editormd.min.js')}}"></script>
    <script src="{{asset('js/hep.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/focusStyle.css')}}">

    <title>{{hd_config('base.title')}}</title>

    <meta name="keywords" content="{{hd_config('base.keyword')}}">
    <meta name="description" content="{{hd_config('base.description')}}">


</head>
<body>

<!-- TOPNAV
================================================== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">

        <!-- Toggler -->
        <button class="navbar-toggler mr-auto" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand mr-auto" href="index.html">
            <img src="{{asset('org/disk/assets')}}/img/logo.png" alt="..." class="navbar-brand-img" style="max-height: 3.0rem!important;">
        </a>


        <form class="form-inline mr-4  d-lg-flex" action="{{route('search')}}">
            <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Input -->
                <input type="search" name="wd" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fe fe-search"></i>
                    </div>
                </div>


            </div>
        </form>

        <!-- User -->
        <div class="navbar-user">

            <!-- Dropdown -->
            <div class="dropdown mr-4 d-none d-lg-flex">

                <!-- Toggle -->
                @auth()
                <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="icon @if(auth()->user()->unreadNotifications()->count() ) active @endif">

                <i class="fe fe-bell"></i>
              </span>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                    <div class="card-header">
                        <div class="row align-items-center">

                            <div class="col-auto">

                                <!-- Link -->
                                <a href="{{route('member.notify',auth()->user())}}" class="small">
                                    我的消息通知({{auth()->user()->unreadNotifications()->count()}})
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .card-header -->
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my--3">
                            @if(auth()->user()->unreadNotifications()->count()!= 0)

                            @foreach(auth()->user()->unreadNotifications()->limit(5)->get() as $notification)

                            <a class="list-group-item px-0" href="{{route('member.notify.show',$notification)}}">

                                <div class="row">
                                    <div class="col-auto">

                                        <!-- Avatar -->
                                        <div class="avatar avatar-sm">
                                            <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                        </div>

                                    </div>
                                    <div class="col ml--2">

                                        <!-- Content -->
                                        <div class="small text-muted">
                                            <strong class="text-body">{{$notification['data']['user_name']}}</strong> 评论了你的 <strong class="text-body">{{$notification['data']['article_title']}}</strong><strong class="text-body">的文章</strong>
                                        </div>

                                    </div>
                                    <div class="col-auto">

                                        <small class="text-muted">
                                            {{$notification->created_at->diffForHumans()}}
                                        </small>

                                    </div>
                                </div> <!-- / .row -->

                            </a>
                                @endforeach
                                @else
                                <p class="text-muted text-center">暂无通知</p>
                        @endif
                        </div>

                    </div>
                </div> <!-- / .dropdown-menu -->

            </div>
        @endauth
            <!-- 登录 -->
            <div class="dropdown">
            @auth()
                <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">{{auth()->user()->name}}</a>

                        {{--@can('view',auth()->user())--}}
                        @can('Admin-admin-index')


                            <a href="{{route('admin.admin')}}" class="dropdown-item">管理员登录</a>
                        @endcan

                        <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">会员中心</a>

                        <hr class="dropdown-divider">
                        <a href="{{route('user.logouts')}}" class="dropdown-item">退出登录</a>
                    </div>
                @else
                    <a href="{{route('userog.login',['form'=>url()->full()])}}"><button class="btn btn-success btn-sm">登录</button></a>
                    <a href="{{route('user.register')}}"><button class="btn btn-danger btn-sm">注册</button></a>
                @endauth
            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse mr-auto order-lg-first" id="navbar">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <input type="search" class="form-control form-control-rounded" placeholder="Search" aria-label="Search">
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                        首页
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{route('article.article.index')}}" id="topnavPages" >
                        文章管理
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="{{route('video.index')}}" id="topnavPages">
                        视频
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="{{route('dynamic')}}" >
                        最新动态
                    </a>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#!" id="topnavDocumentation" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Docs
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="topnavDocumentation">
                        <li>
                            <a class="dropdown-item" href="getting-started.html">
                                Getting started
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="components.html">
                                Components
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="changelog.html">
                                Changelog
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div> <!-- / .container -->
</nav>

<!-- MAIN CONTENT
================================================== -->

<div class="main-content">

    <!-- HEADER -->
   @yield('content')

</div> <!-- / .main-content -->
<footer class="container">
    <hr class="my-0">
    <div class="text-center py-7">
        <div>
            <p class="text-muted">我们的使命：传播互联网前沿技术，帮助更多的人实现梦想</p>
            <small class="small text-secondary">
                Copyright © 2010-2018 soueo.cn All Rights Reserved
                京ICP备12048441号-3
            </small>
            <p class="small text-secondary">
                <i class="fa fa-phone-square" aria-hidden="true"></i> : 15163640385
                <i class="fa fa-telegram ml-2" aria-hidden="true"></i> :
                <a href="mailto:23000711698@qq.com" class="text-secondary">
                    461476246@qq.com
                </a>
                <br>
                编码: <a href="#">Mr Gao</a>

            </p>
        </div>
    </div>
</footer>

<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
@include('layouts.hdjs')
@include('layouts.message')
@stack('js')
</body>
</html>