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
                                用户列表
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('admin.admin')}}" class="btn btn-sm btn-success	DUE DATE 	DUE DATE ">
                                返回栏目
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
                                    用户id
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    用户昵称
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    用户账号
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
                        @foreach($users as $user )
                        <tr>
                            <td class="goal-project">
                                {{$user->id}}
                            </td>
                            <td class="goal-status">
                                <span class="text-warning">●</span>
                            {{$user->name}}
                            </td>
                            <td class="goal-progress">
                                {{$user->email}}
                            </td>
                            <td class="goal-date">

                                <div class="button-group">
                                    <a href="{{route('role.user_create',$user)}}">
                                        <button type="button" class="btn btn-info btn-sm">设置角色</button></a>

                                </div>

                            </td>
                            <td class="text-right">
                                <div class="avatar-group">
                                    {{$user->created_at->diffForHumans()}}
                                </div>
                            </td>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
{{$users->links()}}
        </div>
    </div> <!-- / .row -->

@endsection
