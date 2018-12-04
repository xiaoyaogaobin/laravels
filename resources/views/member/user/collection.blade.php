

@extends('home.layouts.message')
@section('content')
    <div class="main-content">
<div class="container mt-5">

            <div class="row">

                @include('member.layouts.message')

                <div class="card col-sm-9" data-toggle="lists" data-lists-values="[&quot;name&quot;]">

                    <div class="card-header">
                        <div class="">
                            <div class="col">
                                <!-- Title -->
                                <h4 class="card-header-title">
                                    @if($user->id == auth()->id())我@else他@endif的收藏
                                </h4>

                            </div>

                        </div> <!-- / .row -->
                    </div>
                    <div class="card-body">

                        <!-- List -->
                        <ul class="list-group list-group-lg list-group-flush list my--4">
                            @if($collections->count() == 0)
                                <p class="text-muted text-center p-5">暂无收藏</p>
                            @else
                            @foreach($collections as $v)

                                <li class="list-group-item px-0">

                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->

                                            <a href="http://lavel.edu/member/user/1" class="avatar avatar-sm">
                                                <img src="{{$v->article->user->icon}}" alt="..." class="avatar-img rounded">
                                            </a>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Title -->
                                            <h4 class="card-title mb-1 name">
                                                <a href="{{route('article.article.show',$v->article->id)}}"> {{$v->article->title}}</a>
                                            </h4>

                                            <p class="card-text small mb-1">
                                                <a href="" class="text-secondary mr-2">
                                                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{$v->article->user->name}}
                                                </a>

                                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$v->article->created_at->format('Y-m-d')}}

                                                <a href="" class="text-secondary ml-2">
                                                    <i class="fa fa-folder-o" aria-hidden="true"></i> {{$v->article->gate->title}}</a>
                                            </p>

                                        </div>

                                    </div> <!-- / .row -->

                                </li>
                            @endforeach
                                @endif
                        </ul>

                    </div>{{$collections->links()}}
                </div>




            </div>
</div>
    </div>
@endsection