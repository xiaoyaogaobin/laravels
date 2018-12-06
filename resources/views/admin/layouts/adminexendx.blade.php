
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
@stack('css')


    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/flatpickr/dist/flatpickr.min.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Theme CSS -->

    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/css/theme.min.css">

    <title>后台管理</title>
</head>
<body>

<!-- MODALS
================================================== -->
<!-- Modal: Members -->
<div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-card card" data-toggle="lists" data-lists-values='["name"]'>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title" id="exampleModalCenterTitle">
                                Add a member
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Close -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="card-header">

                    <!-- Form -->
                    <form>
                        <div class="input-group input-group-flush input-group-merge">
                            <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fe fe-search"></span>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="card-body">

                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Miyah Myles</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Ryu Duke</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Glen Rouse</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-warning">●</span> Busy
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                        <li class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                        <a href="profile-posts.html">Grace Gross</a>
                                    </h4>

                                    <!-- Time -->
                                    <p class="small mb-0">
                                        <span class="text-danger">●</span> Offline
                                    </p>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                        Add
                                    </a>

                                </div>
                            </div> <!-- / .row -->

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Search -->
<div class="modal fade" id="sidebarModalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-body" data-toggle="lists" data-lists-values='["name"]'>

                <!-- Form -->
                <form class="mb-4">
                    <div class="input-group input-group-merge">
                        <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fe fe-search"></span>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- List group -->
                <div class="my--3">
                    <div class="list-group list-group-flush list">
                        <a href="team-overview.html" class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Airbnb
                                    </h4>

                                    <!-- Time -->
                                    <p class="small text-muted mb-0">
                                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                    </p>

                                </div>
                            </div> <!-- / .row -->
                        </a>
                        <a href="team-overview.html" class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Medium Corporation
                                    </h4>

                                    <!-- Time -->
                                    <p class="small text-muted mb-0">
                                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                    </p>

                                </div>
                            </div> <!-- / .row -->
                        </a>
                        <a href="project-overview.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar avatar-4by3">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Homepage Redesign
                                    </h4>

                                    <!-- Time -->
                                    <p class="small text-muted mb-0">
                                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                    </p>

                                </div>
                            </div> <!-- / .row -->

                        </a>
                        <a href="project-overview.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar avatar-4by3">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Travels & Time
                                    </h4>

                                    <!-- Time -->
                                    <p class="small text-muted mb-0">
                                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                    </p>

                                </div>
                            </div> <!-- / .row -->

                        </a>
                        <a href="project-overview.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar avatar-4by3">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Safari Exploration
                                    </h4>

                                    <!-- Time -->
                                    <p class="small text-muted mb-0">
                                        <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                    </p>

                                </div>
                            </div> <!-- / .row -->

                        </a>
                        <a href="profile-posts.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Dianna Smiley
                                    </h4>

                                    <!-- Status -->
                                    <p class="text-body small mb-0">
                                        <span class="text-success">●</span> Online
                                    </p>

                                </div>
                            </div> <!-- / .row -->

                        </a>
                        <a href="profile-posts.html" class="list-group-item px-0">

                            <div class="row align-items-center">
                                <div class="col-auto">

                                    <!-- Avatar -->
                                    <div class="avatar">
                                        <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                    </div>

                                </div>
                                <div class="col ml--2">

                                    <!-- Title -->
                                    <h4 class="text-body mb-1 name">
                                        Ab Hadley
                                    </h4>

                                    <!-- Status -->
                                    <p class="text-body small mb-0">
                                        <span class="text-danger">●</span> Offline
                                    </p>

                                </div>
                            </div> <!-- / .row -->

                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal: Activity -->
<div class="modal fade" id="sidebarModalActivity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <!-- Title -->
                <h4 class="modal-title">
                    Notifications
                </h4>

                <!-- Close -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                &times;
              </span>
                </button>

            </div>
            <div class="modal-body">

                <!-- List group -->
                <div class="list-group list-group-flush my--3">
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Adolfo Hess</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                    sign-in.html         </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Glen Rouse</strong> commented <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                    <a class="list-group-item px-0" href="#!">

                        <div class="row">
                            <div class="col-auto">

                                <!-- Avatar -->
                                <div class="avatar avatar-sm">
                                    <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                </div>

                            </div>
                            <div class="col ml--2">

                                <!-- Content -->
                                <div class="small text-muted">
                                    <strong class="text-body">Grace Gross</strong> subscribed to you.
                                </div>

                            </div>
                            <div class="col-auto">

                                <small class="text-muted">
                                    2m
                                </small>

                            </div>
                        </div> <!-- / .row -->

                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- SIDEBAR
================================================== -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand"  target="_blank" href="{{route('home')}}">
            <img src="{{asset('org/disk/assets')}}/img/logo.png" class="navbar-brand-img
          mx-auto" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                        <img src="{{auth()->user()}}" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">{{auth()->user()->name}}</a>

                    <hr class="dropdown-divider">
                    <a href="{{route('user.logouts')}}" class="dropdown-item">退出登录</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">

            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fe fe-search"></span>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " target="_blank" href="{{route('home')}}">
                        <i class="fa fa-truck" style="display: inline-block;min-width: 1.75rem;!important;" ></i> 网站首页
                    </a>
                </li>

                <li class="nav-item  dropdown">
                    <a class="nav-link" href="#sidebarAuth" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="fa fa-globe" style="display: inline-block;min-width: 1.75rem;!important;"></i> 网站配置
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav nav-sm flex-column">
                            @can('Admin-admin-basic')
                            <li class="nav-item show">
                                <a href="{{route('config.edit',['name'=>'base'])}}" class="nav-link" >
                                    基本配置
                                </a>

                            </li>
                            @endcan

                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'upload'])}}" class="nav-link" >
                                    上传配置
                                </a>

                            </li>

                                @can('Admin-admin-email')
                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'email'])}}" class="nav-link" >
                                    邮件配置
                                </a>

                            </li>
                                @endcan
                                @can('Admin-admin-number')
                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'code'])}}" class="nav-link" >
                                    验证码配置
                                </a>

                            </li>
                                @endcan
                                @can('Admin-admin-search')
                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'search'])}}" class="nav-link" >
                                    搜索配置
                                </a>

                            </li>
                                @endcan
                                @can('Admin-admin-iphone')
                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'iphone'])}}" class="nav-link" >
                                    手机配置
                                </a>

                            </li>
                                @endcan
                                @can('Admin-admin-wechat')
                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'wechat'])}}" class="nav-link" >
                                    微信配置
                                </a>

                            </li>
                                @endcan


                        </ul>
                    </div>
                </li>
                @can('Article-column-management')
                {{--文章管理   --}}
                <li class="nav-item">
                    <a class="nav-link" href="#sidebarPages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="fa fa-book" style="display: inline-block;min-width: 1.75rem;!important;"></i> 文章系统
                    </a>
                    <div class="collapse " id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.category.index')}}" class="nav-link"  role="button" aria-expanded="false" aria-controls="sidebarProfile">
                                    栏目管理
                                </a>

                            </li>

                        </ul>
                    </div>
                </li>
                {{--文章管理--}}
                @endcan
                {{--视频管理--}}
                @can('video-video-management')
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                        <i class="fa fa-video-camera" style="display: inline-block;min-width: 1.75rem;!important;"></i> 视频管理
                    </a>
                    <div class="collapse " id="sidebarComponents">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.column.index')}}" class="nav-link">
                                    视频栏目
                                </a>
                            </li>


                            </li>
                            <li class="nav-item">
                                <a href="components.html#dropdowns" class="nav-link">
                                    Dropdowns
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#forms" class="nav-link">
                                    Forms
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#icons" class="nav-link">
                                    Icons
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#lists" class="nav-link">
                                    Lists
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#loaders" class="nav-link">
                                    Loaders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="components.html#modal" class="nav-link">
                                    Modal
                                </a>
                            </li>

                            </li>
                            <li class="nav-item">
                                <a href="components.html#social-posts" class="nav-link">
                                    Social post
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endcan
                {{--数据库配置--}}
                @if(auth()->user()->is_admin==1)
                <li class="nav-item ">
                    <a class="nav-link" href="#sidebarLayouts" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="fa fa-database" style="display: inline-block;min-width: 1.75rem;!important;"></i> 数据库配置
                    </a>
                    <div class="collapse " id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('config.edit',['name'=>'mysql'])}}" class="nav-link">
                                    基本配置 <span class="badge badge-soft-danger ml-auto">Mysql</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-side-topnav.html" class="nav-link ">
                                    Sidenav + top nav
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-topnav.html" class="nav-link">
                                    Topnav
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->hasAnyPermission(['Wechat-button']))
                {{--微信配置--}}
                <li class="nav-item ">

                    <a class="nav-link" href="#sidebarDashboard" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboard">
                        <i class="fa fa-wechat" style="display: inline-block;min-width: 1.75rem;!important;"></i> 微信配置
                    </a>
                    <div class="collapse " id="sidebarDashboard">
                        <ul class="nav nav-sm flex-column">
                            @can('Wechat-response-base')
                            <li class="nav-item">
                                <a href="{{route('wechat.response_base.index')}}" class="nav-link active">
                                    基本回复
                                </a>
                            </li>  @endcan
                                @can('Wechat-button')

                            <li class="nav-item">
                                <a href="{{route('wechat.button.index')}}" class="nav-link ">
                                    微信菜单
                                </a>
                            </li>@endcan
                                @can('Wechat-response-text')

                            <li class="nav-item">
                                <a href="{{route('wechat.response_text.index')}}" class="nav-link active">
                                    文本回复
                                </a>
                            </li>
                            @endcan
                                @can('Wechat-response-news')

                            <li class="nav-item">
                                <a href="{{route('wechat.response_news.index')}}" class="nav-link active">
                                    图文回复
                                </a>
                            </li>

                                @endcan
                            <li class="nav-item">
                                <a href="dashboard-topnav-no-hero.html" class="nav-link">
                                    Topnav
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                {{--轮播图--}}
                @can('Slide-slide')
                <li class="nav-item">
                    <a href="#sidebarError" class="nav-link" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarError">
                        <i class="fa fa-file-image-o" style="display: inline-block;min-width: 1.75rem;!important;"></i> 轮播图
                    </a>
                    <div class="collapse" id="sidebarError">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('slide.index')}}" class="nav-link">
                                    图片修改
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('slide.create')}}" class="nav-link">
                                    上传图片
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endcan
                @if(auth()->user()->is_admin==1)
                <li class="nav-item">
                    <a href="#sidebarProject" class="nav-link collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProject">
                        <i class="fa fa-male" style="display: inline-block;min-width: 1.75rem;!important;"></i>权限管理
                    </a>
                    <div class="collapse show" id="sidebarProject" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('role.user_sole')}}" class="nav-link ">
                                    用户管理<span class="badge badge-soft-success ml-auto">User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('role.role.index')}}" class="nav-link ">
                                    角色列表<span class="badge badge-soft-success ml-auto">Role</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('role.permission.index')}}" class="nav-link ">
                                    权限列表 <span class="badge badge-soft-success ml-auto">Permission</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                @endif
                <li class="nav-item d-md-none">
                    <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                        <span class="fe fe-bell"></span> Notifications
                    </a>
                </li>
            </ul>

            <!-- Divider -->
            <hr class="my-3">

            <!-- Heading -->
            <h6 class="navbar-heading text-muted">
                Documentation
            </h6>

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link " href="getting-started.html">
                        <i class="fe fe-clipboard"></i> Getting started
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="changelog.html">
                        <i class="fe fe-git-branch"></i> Changelog <span class="badge badge-primary ml-auto">v1.1.2</span>
                    </a>
                </li>
            </ul>



        </div> <!-- / .navbar-collapse -->

    </div> <!-- / .container-fluid -->
</nav>

<!-- MAIN CONTENT
================================================== -->
<div class="main-content">

    <!-- TOPBAR -->
    <nav class="navbar navbar-expand-md navbar-light bg-white d-none d-md-flex">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand mr-auto" href="">
                {{hd_config('base.title')}}
            </a>

            <!-- Form -->
            <form class="form-inline mr-4 d-none d-md-flex" action="{{route('search')}}">
                <div class="input-group input-group-rounded input-group-merge" data-toggle="lists" data-lists-values='["name"]'>

                    <!-- Input -->
                    <input type="search" name="wd" class="form-control form-control-prepended  dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fe fe-search"></i>
                        </div>
                    </div>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-card">
                        <div class="card-body">

                            <!-- List group -->
                            <div class="list-group list-group-flush list my--3">
                                <a href="team-overview.html" class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Airbnb
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->
                                </a>
                                <a href="team-overview.html" class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Medium Corporation
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->
                                </a>
                                <a href="project-overview.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-4by3">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Homepage Redesign
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="project-overview.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-4by3">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Travels & Time
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="project-overview.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar avatar-4by3">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Safari Exploration
                                            </h4>

                                            <!-- Time -->
                                            <p class="small text-muted mb-0">
                                                <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="profile-posts.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Dianna Smiley
                                            </h4>

                                            <!-- Status -->
                                            <p class="text-body small mb-0">
                                                <span class="text-success">●</span> Online
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                                <a href="profile-posts.html" class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <div class="avatar">
                                                <img src="{{asset('org/disk/assets')}}/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="text-body mb-1 name">
                                                Ab Hadley
                                            </h4>

                                            <!-- Status -->
                                            <p class="text-body small mb-0">
                                                <span class="text-danger">●</span> Offline
                                            </p>

                                        </div>
                                    </div> <!-- / .row -->

                                </a>
                            </div>

                        </div>
                    </div> <!-- / .dropdown-menu -->

                </div>
            </form>

            <!-- User -->
            <div class="navbar-user">

                <!-- Dropdown -->
                <div class="dropdown mr-4 d-none d-lg-flex">

                    <!-- Toggle -->

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

                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="profile-posts.html" class="dropdown-item">{{auth()->user()->name}}</a>
                        <a href="{{route('member.user.show',auth()->user())}}" class="dropdown-item">会员中心</a>
                        <hr class="dropdown-divider">
                        <a href="{{route('user.logouts')}}" class="dropdown-item">退出登录</a>
                    </div>

                </div>

            </div>

        </div> <!-- / .container-fluid -->
    </nav>

    <!-- CARDS -->
    <div class="container-fluid mt-5">
        @yield('content')
    </div><!-- / .container-fluid -
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
                    <a href="" class="text-secondary">
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
    {{--"content-hash": "f952fc20db9e32f6892cadab711c5150",--}}

<!-- Libs JS -->
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['bootstrap'])
</script>
@stack('javascript')
</body>
</html>