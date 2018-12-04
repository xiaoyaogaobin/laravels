<div class="list-group-item px-0" >

    <div class="row">
        <div class="col-auto">

            <!-- Avatar -->
            <a href="{{route('member.user.show',$activity->causer)}}" class="avatar avatar-sm">
                <img src="{{$activity->causer->icon}}" alt="..." class="avatar-img rounded-circle">
            </a>
        </div>
        <div class="col ml--2">
            <!-- Content -->
            <div class="small text-muted">
                <a href="{{route('member.user.show',$activity->causer)}}">
                    <strong class="text-body">{{$activity->causer->name}}</strong>
                </a>
                @if($activity['description']== 'created')
                    发布了
                @elseif($activity['description']== 'updated')
                    修改了
                @endif
                <a href="{{route('article.article.show',$activity['properties']['attributes']['id'])}}">
                    <strong class="text-body">{{$activity['properties']['attributes']['title']}}</strong>

                </a>
            </div>

        </div>
        <div class="col-auto">

            <small class="text-muted">
                {{$activity->created_at->diffForHumans()}}
            </small>

        </div>
    </div> <!-- / .row -->

</div>