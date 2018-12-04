@extends('admin.layouts.adminexendx')
@section('content')

    <div class="row">

        <div class="col-12 ">

            <!-- 栏目列表 -->
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                手机配置
                            </h4>

                        </div>

                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                    <div class=" text-center">

                        <div class="card-body">
                            <form action="{{route('config.upload',['name'=>$name])}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">账号</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="iphone_user" value="{{$config['data']['iphone_user']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">密码</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="iphone_password" value="{{$config['data']['iphone_password']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">注册短信设置</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="iphone_register" value="{{$config['data']['iphone_register']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">重置短信设置</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="iphone_reset" value="{{$config['data']['iphone_reset']??''}}" class="form-control" id="exampleInputEmail1" placeholder="">
                                    </div>
                                </div>

                                <button  class="btn btn-primary">保存</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div> <!-- / .row -->

@endsection
@push('javascript')
    <script type="text/javascript">

        function bt(){
            require(['hdjs'], function (hdjs) {
                hdjs.font(function(icon){
                    // 图标展示
                    $('#icon').addClass(icon).html('');
                    //图片展示在页面
                    $('input[name =icon]').val(icon);

                })
            })

        }

    </script>
@endpush