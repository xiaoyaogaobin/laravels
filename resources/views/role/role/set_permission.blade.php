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
                    [<font class="text-info"> {{$role->title}}</font>] 权限列表
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

                <form action="{{route('role.role.set_role_permission',$role)}}" method="post">
                    @csrf
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
                                                <input type="checkbox"
                                                       name="permissions[]"
                                                       value="{{$module['name'] . '-' . $v['name']}}"

                                                       @if($role->hasPermissionTo($module['name'] . '-' . $v['name']))  checked
                                                       @endif
                                                       @if('Admin-admin-index' == $module['name'] . '-' . $v['name'])
                                                       checked
                                                        @endif
                                                />
                                                <span class="size4">{{$v['title']}}</span>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                        <button class="btn-success btn">保存</button>
                    </div>

                </form>

            </div>

        </div>
    </div> <!-- / .row -->

@endsection
