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
                                视频栏目列表
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('admin.column.create')}}" class="btn btn-sm btn-success">
                                添加视频栏目
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
                            <th> 视频标题

                            </th>
                            <th>
                                视频logo

                            </th>
                            <th> 视频创建时间

                            </th>
                            <th class="text-right">
                                视频栏目操作
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($videpcolumns as $videoColumn)
                            <tr>
                                <td class="goal-project">
                                    {{$videoColumn->id}}
                                </td>
                                <td class="goal-status">
                                    <span class="text-warning">●</span>
                                    {{$videoColumn->title}}
                                </td>
                                <td class="goal-progress">
                                    <span class="{{$videoColumn->icon}}"></span>
                                </td>
                                <td class="goal-date">
                                    <time >{{$videoColumn->created_at}}</time>

                                </td>
                                <td class="text-right">
                                    <div class="button-group">
                                        <a href="{{route('admin.column.edit',$videoColumn)}}">
                                            <button type="button" class="btn btn-success btn-sm">修改</button></a>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="del(this)" >删除</button>
                                        <form action="{{route('admin.column.destroy',$videoColumn)}}" method="post" id="form">
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
    {{ $videpcolumns->links()}}
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
