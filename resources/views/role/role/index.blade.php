@extends('admin.layouts.adminexendx')
@section('content')
     <!-- / .row -->
    <div class="row">

        <div class="col-12 col-xl-12">

            <!-- Goals -->
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                角色列表
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('role.role.create')}}" class="btn btn-sm btn-success	DUE DATE 	DUE DATE ">
                                +添加角色
                            </a>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                        <tr>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    角色中文名称
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    角色英文名称
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    守卫
                                </a>
                            </th>
                            <th >
                                <a href="#" class="text-muted sort " >
                                    操作
                                </a>
                            </th>
                            <th class="text-right">
                                创建时间
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($roles as $role )
                        <tr>
                            <td class="goal-project">
                                {{$role->title}}
                            </td>
                            <td class="goal-status">
                                <span class="text-warning">●</span>
                            {{$role->name}}
                            </td>
                            <td class="goal-progress">
                                {{$role->guard_name}}
                            </td>
                            <td class="goal-date">

                                <div class="button-group">
                                    <a href="{{route('role.role.edit',$role)}}">
                                        <button type="button" class="btn btn-primary btn-sm">权限设置</button></a>
                                    <a href="{{route('role.role.edit',$role)}}">
                                        <button type="button" class="btn btn-success btn-sm">修改</button></a>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="del(this)">删除</button>
                                    <form action="{{route('role.role.destroy',$role)}}" id="del" method="post">
                                        @csrf @method('DELETE')
                                                                   </form>
                                </div>

                            </td>
                            <td class="text-right">
                                <div class="avatar-group">
                                    {{$role->created_at->diffForHumans()}}
                                </div>
                            </td>

                            @endforeach
                        </tbody>
                    </table>
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