
@extends('home.layouts.message')
@section('content')
    <div class="main-content">

        <div class="container mt-5">

            <div class="row">

                @include('member.layouts.message')

                <div class="card col-sm-9" data-toggle="lists" data-lists-values="[&quot;name&quot;]">

                    <div class="header-body mt--5 ">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-overflow header-tabs">
                                    <li class="nav-item">
                                        <a href="{{route('member.my_zan',[$user,'type'=>'article'])}}" class="nav-link active">
                                            文章
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('member.my_zan',[$user,'type'=>'comments'])}}" class="nav-link">
                                            评论
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <!-- Files -->
                            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <!-- Title -->
                                            <h4 class="card-header-title">
                                                我赞过的文章
                                            </h4>
                                        </div>
                                    </div> <!-- / .row -->
                                </div>
                                <div class="card-body">

                                    <!-- List -->
                                    <ul class="list-group list-group-lg list-group-flush list my--4">
                                        @foreach($zans as $zan)
                                            {{--{{$zan->belongsModel}}--}}
                                            <li class="list-group-item px-0">

                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <!-- Avatar -->

                                                            <a href="{{route('member.user.show',$zan->belongsModel->user)}}" class="avatar avatar-sm" target="-_blank">
                                                                <img src="{{$zan->belongsModel->user->icon}}" alt="..." class="avatar-img rounded">
                                                            </a>


                                                    </div>
                                                    <div class="col ml--2">

                                                        <!-- Title -->
                                                        <h4 class="card-title mb-1 name">
                                                            <a href="{{route('article.article.show',$zan->belongsModel)}}">
                                                                {{$zan->belongsModel->title}}</a>
                                                        </h4>

                                                        <p class="card-text small mb-1">
                                                            <a href="{{route('member.user.show',$zan->belongsModel->user)}}" class="text-secondary mr-2">
                                                                <i class="fa fa-user-circle" aria-hidden="true"></i> {{$zan->belongsModel->user->name}}
                                                            </a>

                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$zan->belongsModel->created_at->diffForHumans()}}

                                                            <a href="#" class="text-secondary ml-2">
                                                                <i class="fa fa-folder-o" aria-hidden="true"></i>
                                                                {{$zan->belongsModel->gate->title}}
                                                            </a>
                                                        </p>

                                                    </div>

                                                </div> <!-- / .row -->

                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            {{--{{$zans->links()}}--}}
                            {{    $zans->appends(['type' => Request::query('type')])->links() }}
                            {{--{{$zans->appends(['type'=>Request::query('type')])->links()}}--}}
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection