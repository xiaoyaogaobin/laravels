@extends('home.layouts.message')
@section('content')
    <div class="main-content">

        <div class="container mt-5">
            <div class="row">
                @include('member.layouts.message')
                <div class="col-sm-9">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <!-- Files -->
                                <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">

                                                <!-- Title -->
                                                <h4 class="card-header-title">
                                                    @if($user->id == auth()->id())我
                                                    @else他@endif的文章
                                                </h4>

                                            </div>
                                            @can('isMain',$user)
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="{{route('article.article.create')}}" class="btn btn-sm btn-primary">
                                                    发表文章
                                                </a>

                                            </div>
                                                @endcan
                                        </div> <!-- / .row -->
                                    </div>

                                    <div class="card-body">

                                        <!-- List -->
                                        <ul class="list-group list-group-lg list-group-flush list my--4">
                                            @foreach($articles as $article)
                                                <li class="list-group-item px-0">

                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <!-- Avatar -->
                                                            <a href="{{route('member.user.show',$user)}}" class="avatar avatar-sm">
                                                                <img src="{{$article->user->icon}}" alt="..." class="avatar-img rounded">
                                                            </a>

                                                        </div>
                                                        <div class="col ml--2">

                                                            <!-- Title -->
                                                            <h4 class="card-title mb-1 name">
                                                                <a href="{{route('article.article.show',$article)}}">{{$article->title}}</a>
                                                            </h4>

                                                            <p class="card-text small mb-1">
                                                                <a href="" class="text-secondary mr-2">
                                                                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{$article->user->name}}
                                                                </a>

                                                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$article->user->created_at->diffForHumans()}}

                                                                <a href="{{route('article.article.index',['gategory'=>$article->gate->id])}}" class="text-secondary ml-2">
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
                                                                    <a href="http://laravel.ishilf.com/home/article/111" class="dropdown-item">
                                                                        查看详情
                                                                    </a>
                                                                    <a href="http://laravel.ishilf.com/home/article/111/edit" class="dropdown-item">
                                                                        编辑
                                                                    </a>
                                                                    <a href="javascript:;" onclick="del(this)" class="dropdown-item">
                                                                        删除
                                                                    </a>
                                                                    <form action="http://laravel.ishilf.com/home/article/111" method="post">
                                                                        <input type="hidden" name="_token" value="gJsDTKmbE8Z7VxvX3FA0hFKcFCWPU35cCHQ5sWMH"> <input type="hidden" name="_method" value="DELETE">                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div> <!-- / .row -->

                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>


                            </div>
                        </div> <!-- / .row -->
                        {{$articles->links()}}

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection