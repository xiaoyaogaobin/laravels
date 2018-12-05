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
                            <a href="{{route('wechat.button.index')}}"> <span class="h2 mb-0 text-success" >
                      权限列表
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
                <div class="card-header">
                    <a href="{{route('role.forgetPermissionCache')}}">清除模块缓存</a>
                </div>
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                权限列表
                            </h4>


                        </div>

                    </div> <!-- / .row -->
                </div>
                <div class="card-body">
                    @foreach($modules as $module)
                    <div class="card">
                        <div class="card-header">
                            <div class="text-danger mt-4 "><h2>{{$module->title}}</h2></div>
                        </div>
                        <div class="row">
                        @foreach($module['permissions'] as $v)
                    <div class="card-body">
                        <div class="col-12">
                            <span class="small"><h5>{{$v['title']}}</h5></span>
                            <p class="text-info">{{$module['name']}}-{{$v['name']}}</p>
                        </div>
                    </div>
                            @endforeach
                        </div>

                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div> <!-- / .row -->

@endsection
<script>
    function del(obj){
        require(['hdjs','bootstrap'], function (hdjs) {
            hdjs.confirm('确定删除吗?', function () {
                $('#del').submit();
            })
        })}
</script>