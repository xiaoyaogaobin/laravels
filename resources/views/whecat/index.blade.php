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
                      菜单列表
                    </span>
                           </a>
                        </div>

                    </div> <!-- / .row -->

                </div>
            </div>

        </div>
        <div class="col-12 col-lg-6 col-xl">

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center text-center">
                        <div class="col">

                            <!-- Heading -->
                           <a href ="{{route('wechat.button.create')}}">
                               <span class="h2 text-black-50">
                      添加菜单
                             </span>
                               </a>
                            <!-- Badge -->


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
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h4 class="card-header-title">
                                菜单列表
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('wechat.button.create')}}" class="btn btn-sm btn-success	DUE DATE 	DUE DATE ">
                                +添加新菜单
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
                                    序列号
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    菜单标题
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    表单启用
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
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
                        @foreach($buttons as $button)
                        <tr>
                            <td class="goal-project">
                                {{$button->id}}
                            </td>
                            <td class="goal-status">
                                <span class="text-warning">●</span> {{$button->title}}
                            </td>
                            <td class="goal-progress">

                                <a href="{{route('wechat.button.push',$button)}}" class="btn btn-info btn-sm">
                                    @if($button->status == 1)
                                    已启用
                                        @else
                                    未启用
                                        @endif
                                </a>
                            </td>
                            <td class="goal-date">
                                <time datetime="2018-10-24">{{$button->created_at->diffForHumans()}}</time>
                            </td>
                            <td class="text-right">

                                <div class="button-group">
                                    <a href="{{route('wechat.button.edit',$button)}}">
                                        <button type="button" class="btn btn-success btn-sm">修改</button></a>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="del(this)">删除</button>
                                    <form action="{{route('wechat.button.destroy',$button)}}" id="del" method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>

                            </td>

                        </tr>
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