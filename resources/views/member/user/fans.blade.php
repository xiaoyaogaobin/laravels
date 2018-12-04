@extends('home.layouts.message')
@section('content')
    <div class="main-content">

        <div class="container mt-5">
            <div class="row">
                @include('member.layouts.message')
                <div class="col-sm-9">
                    <div class="row">
                        @if($fansd->count() == 0)
                            <p class="text-muted text-center p-5">暂无粉丝</p>
                            @else
                        @foreach($fansd as $fans)
                            <div class="card card-inactive col-sm-4 ">
                                <div class="card-body text-center">

                                    <!-- Image -->
                                    <img src="{{$fans->icon}}" alt="..." class="avatar-img rounded-circle"
                                         style="max-width: 128px;">

                                    <!-- Title -->
                                    <div class="mt-3">
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                {{$fans->name}}
                                            </font></font></div>

                                    <!-- Subtitle -->
                                    <p class="card-text">
                                          <span class="badge badge-soft-secondary">
                                            粉丝:{{$fans->fans->count()}}
                                          </span>
                                        <span class="badge badge-soft-secondary">
                                            关注:{{$fans->following->count()}}
                                          </span>
                                    </p>

                                    <!-- Button -->
                                    @can('isMain',$user)
                                    @auth()
                                    <div class="mt-3">
                                        <a href="{{route('member.attention',$fans)}}" class="btn btn-primary"><font style="vertical-align: inherit;"><font
                                                        style="vertical-align: inherit;">
                                                    @if( $fans->fans->contains(auth()->user()))
                                                        关注
                                                    @else
                                                        取消关注
                                                    @endif
                                                </font></font></a>
                                    </div>
                                        @endauth
                                        @endcan
                                </div>
                            </div>
                        @endforeach
                            @endif
                    </div>
                    {{$fansd->links()}}
                </div>

            </div>
        </div>

    </div>

@endsection