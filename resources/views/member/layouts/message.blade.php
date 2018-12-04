<div class="col-sm-3">
    <div class="card">
        <div class="card-block text-center pt-5">
            <div class="avatar avatar-xxl">
                <a href="{{route('member.user.show',$user)}}">
                    <img src="{{$user->icon}}" class="avatar-img rounded-circle">
                </a>
            </div>
            <div class="text-center mt-4">
                <a href="{{route('member.user.show',$user)}}">
                    <h3 class="text-secondary">{{$user->name}}</h3>
                </a>
            </div>
        </div>
        <div class="card-body text-center pt-1 pb-2">
            @can('isMain',$user)
                <div class="nav flex-column nav-pills ">
                    <a href="{{route('member.user.edit',[$user,'type'=>'icon'])}}" class="nav-link text-muted {{active_class(if_route(['member.user.edit']&& if_query('type', 'icon')), 'active', '')}}">
                        修改头像
                    </a>
                </div>

                <div class="nav flex-column nav-pills ">
                    <a href="{{route('member.user.edit',[$user,'type'=>'password'])}}" class="nav-link text-muted {{active_class(if_route(['member.user.edit']&& if_query('type', 'password')), 'active', '')}}">
                        修改密码
                    </a>
                </div>
                <div class="nav flex-column nav-pills ">
                    <a href="{{route('member.user.edit',[$user,'type'=>'name'])}}" class="nav-link text-muted {{active_class(if_route(['member.user.edit']&& if_query('type', 'name')), 'active', '')}}">
                        修改昵称
                    </a>
                </div>
            @endcan
            <div class="nav flex-column nav-pills ">
                @if($user->id == auth()->id())
                <a href="{{route('member.fans',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.fans']), 'active', '')}}">
                    我的粉丝
                </a>
                @else
                <a href="{{route('member.fans',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.fans']), 'active', '')}}">
                    他的粉丝
                </a>
                @endif
                    @if($user->id == auth()->id())
                <a href="{{route('member.follow',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.follow']), 'active', '')}}">
                    我的关注
                </a>
                    @else
                        <a href="{{route('member.follow',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.follow']), 'active', '')}}">
                            他的关注
                        </a>
                    @endif

                    @if($user->id == auth()->id())
                        <a href="{{route('member.collection',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.collection']), 'active', '')}}">
                            我的收藏
                        </a>
                    @else
                        <a href="{{route('member.collection',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.collection']), 'active', '')}}">
                            他的收藏
                        </a>
                    @endif
                    @if($user->id == auth()->id())
                        <a href="{{route('member.my_zan',[$user,'type'=>'article'])}}" class="nav-link text-muted {{active_class(if_route(['member.my_zan']), 'active', '')}}">
                            我的点赞
                        </a>
                    @else
                        <a href="{{route('member.my_zan',[$user,'type'=>'article'])}}" class="nav-link text-muted {{active_class(if_route(['member.my_zan']), 'active', '')}}">
                            他的点赞
                        </a>
                    @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <div class="nav flex-column nav-pills">
                @auth()
                <a href="{{route('member.notify',auth()->user())}}" class="nav-link text-muted {{active_class(if_route(['member.notify']), 'active', '')}}">
                    我的通知({{auth()->user()->unreadNotifications()->count()}})
                </a>
                @endauth
                <a href="" class="nav-link
                                    text-muted">
                    文档管理
                </a>
                <a href="" class="nav-link
                                    text-muted">
                    会员时长
                </a>
            </div>
        </div>
    </div>
</div>
@push('css')


    @endpush