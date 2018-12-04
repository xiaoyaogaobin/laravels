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
                                栏目列表
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('admin.category.create')}}" class="btn btn-sm btn-white">
                                添加栏目
                            </a>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                    <table class="table table-sm table-nowrap card-table">
                        <thead>
                        <tr>
                            <th>栏目id

                            </th>
                            <th> 栏目标题

                            </th>
                            <th>
                                栏目头像

                            </th>
                            <th> 栏目时间

                            </th>
                            <th class="text-right">
                                栏目操作
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($categorys as $category)
                        <tr>
                            <td class="goal-project">
                                {{$category->id}}
                            </td>
                            <td class="goal-status">
                                <span class="text-warning">●</span>
                                {{$category->title}}
                            </td>
                            <td class="goal-progress">
                                <span class="{{$category->icon}}"></span>
                            </td>
                            <td class="goal-date">
                                <time >{{$category->created_at}}</time>
                            </td>
                            <td class="text-right">
                                <div class="button-group">
                                    <a href="{{route('admin.category.edit',$category)}}">
                                        <button type="button" class="btn btn-success btn-sm">修改</button></a>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="del(this)" >删除</button>
                                    <form action="{{route('admin.category.destroy',$category)}}" method="post" id="form">
                                        @csrf
                                        @method('DELETE')
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
    {{ $categorys->links()}}
@endsection

<script>
    function del(obj){
    require(['hdjs','bootstrap'], function (hdjs) {
        hdjs.confirm('确定删除吗?', function () {
            $('#form').submit();
        })
    })
    }
</script>
