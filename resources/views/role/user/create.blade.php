@extends('admin.layouts.adminexendx')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-6 col-xl">

            <!-- Card -->
            <div class="card">
                <div class="card-body ">
                    <div class="row align-items-center text-center ">
                        <div class="col ">
                            <!-- Badge -->
                            <a href="{{route('wechat.button.index')}}">
                                <span class="h2 mb-0 ">给
                    [<font class="text-info">{{$user['name']}}</font>] 权限列表
                    </span>
                            </a>
                        </div>

                    </div> <!-- / .row -->

                </div>
            </div>

        </div>


    </div> <!-- / .row -->
    <div class="row">

        <div class="col-12 col-xl-12">

            <!-- Goals -->
            <div class="card">

                <form action="{{route('role.user_set_role_store',$user)}}" method="post">
                    @csrf
                    <div class="card-body">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                    @foreach($roles as $role)
                                        <div class="col-4">
                                            <input type="checkbox"
                                            name="roles[]"
                                            value="{{$role['name']}}"
                                            @if($user->hasRole($role['name'])) checked @endif
                                                    >
                                   <span>{{$role->title}}</span>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>



                        <button class="btn-success btn">保存</button>
                    </div>

                </form>

            </div>

        </div>
    </div> <!-- / .row -->

@endsection
