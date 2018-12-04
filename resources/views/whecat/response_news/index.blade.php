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
                           <a href="{{route('wechat.response_news.index')}}"> <span class="h2 mb-0 text-success" >
                      图文列表
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
                           <a href ="{{route('wechat.response_news.create')}}">
                               <span class="h2 text-black-50">
                      添加图文
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
                                     回复列表
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('wechat.response_news.create')}}" class="btn btn-sm btn-success	DUE DATE 	DUE DATE ">
                                +添加新图文
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
                                    编号
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    规则名称
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    关键词
                                </a>
                            </th>
                            <th>
                                <a href="#" class="text-muted sort" >
                                    操作
                                </a>
                            </th>

                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach($fields as $field)
                        <tr>
                            <td class="goal-project">
                                {{$field->id}}
                            </td>
                            <td class="goal-status">
                                <span class="text-warning">●</span> {{$field->rule->name}}
                            </td>
                            <td class="goal-progress">

                                {{implode(',',$field->rule->keyword->pluck('key')->toArray())}}


                            </td>
                            <td class="goal-date">
                                <div class="button-group">
                                    <a href="{{route('wechat.response_news.edit',$field)}}">
                                        <button type="button" class="btn btn-success btn-sm">修改</button></a>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="del(this)">删除</button>
                                    <form action="{{route('wechat.response_news.destroy',$field)}}" id="del" method="post">
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