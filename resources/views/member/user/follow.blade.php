@extends('home.layouts.message')
@section('content')
    <div class="main-content">

        <div class="container mt-5">
            <div class="row">
                @include('member.layouts.message')
                <div class="col-sm-9">

                    <div class="row">
                        @if($follows->count() == 0)
                            <p class="text-muted text-center p-5">暂无关注</p>
                            @else
                        @foreach($follows as $following)
                            <div class="card card-inactive col-sm-4 ">
                                <div class="card-body text-center">

                                    <!-- Image -->
                                    <img src="{{$following->icon}}" alt="..." class="avatar-img rounded-circle"
                                         style="max-width: 128px;">

                                    <!-- Title -->
                                    <div class="mt-3">
                                   <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                {{$following->name}}
                                            </font></font></div>

                                    <!-- Subtitle -->


                                    <!-- Button -->
                                    @can('isMain',$user)
                                    @auth()
                                    <div class="mt-3">
                                    <a href="{{route('member.attention',$following)}}" class="btn btn-primary"><font style="vertical-align: inherit;"><font
                                                    style="vertical-align: inherit;">
                                                    @if($following->fans->contains($following))

                                                    关注
s
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
                    {{$follows->links()}}

                </div>

            </div>
        </div>

    </div>

@endsection