@extends('home.layouts.message')
@section('content')
    <div class="main-content">

        <div class="container mt-5">
            <div class="row">
                @include('member.layouts.message')
                <div class="col-sm-9">
                    <div class="container-fluid">
                        <div class="row justify-content-center  __web-inspector-hide-shortcut__">
                            <form action="{{route('member.user.update',$user)}}" method="post" class="col-sm-8" id="form-icon">
                               @csrf @method('PUT')
                                <input type="hidden" name="_method" value="PUT">
                                <div class="card-header">
                                    <h4>修改密码</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>新密码</label>
                                        <input type="text" class="form-control " name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>确认密码</label>
                                        <input type="text" class="form-control " name="password_confirmation">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-sm">确定</button>
                                </div>
                            </form></div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection