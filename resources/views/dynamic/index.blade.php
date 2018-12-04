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
        <div class="container mt-5">

            <div class="row">
                <div class="col-12">
                    <!-- Files -->






                        <div class=" mt-5">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Files -->
                                    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h4 class="card-header-title">
                                                        动态
                                                    </h4>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>

                                        <div class="card-body">

                                            <!-- List group -->
                                            <div class="list-group list-group-flush my--3">
                                                @foreach($activities as $activity)
                                                    @if($activity['log_name']=='article')
                                                        @include('dynamic.layous.article')
                                                    @else
                                                        @include('dynamic.layous.comments')
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        <!-- List -->

                                    </div>
                                    {{$activities->links()}}
                                </div>

                            </div>

@endsection

