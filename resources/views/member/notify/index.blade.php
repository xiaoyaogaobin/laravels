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
                                                    我的通知
                                                </h4>

                                            </div>

                                    </div>


                                </div>
                                    <div class="card-body">

                                        <!-- List -->
                                        <ul class="list-group list-group-lg list-group-flush list my--4">
                                            @foreach($notifications as $notification)
                                                <a href="{{route('member.notify.show',$notification)}}">
                                                <li class="list-group-item px-0">

                                                    <div class="row align-items-center">
                                                        <div class="col-auto">

                                                            <!-- Avatar -->
                                                            <div class="avatar avatar-sm">
                                                                <img src="{{$notification['data']['user_icon']}}" alt="..." class="avatar-img rounded-circle">
                                                            </div>

                                                        </div>
                                                        <div class="col ml--2">

                                                            <!-- Content -->
                                                            <div class="small text-muted">
                                                                @if($notification->read_at)
                                                                    <button type="button" class="btn btn-warning btn-sm">已读</button>
                                                                    <strong class="text-body">{{$notification['data']['user_name']}}</strong> 评论了你的 <strong class="text-body">{{$notification['data']['article_title']}}</strong><strong class="text-body">的文章</strong>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm">未读</button>
                                                                <strong class="text-body">{{$notification['data']['user_name']}}</strong> 评论了你的 <strong class="text-body">{{$notification['data']['article_title']}}</strong><strong class="text-body">的文章</strong>

                                                                    @endif
                                                            </div>

                                                        </div>
                                                        <div class="col-auto">

                                                            <small class="text-muted">
                                                                {{$notification->created_at->diffForHumans()}}
                                                            </small>

                                                        </div>

                                                    </div> <!-- / .row -->

                                                </li></a>
                                            @endforeach
                                        </ul>

                                    </div>

                            </div>
                                {{$notifications->links()}}
                        </div> <!-- / .row -->


                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection