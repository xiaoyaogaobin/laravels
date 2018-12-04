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
                            栏目修改
                        </h4>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-white">
                            返回栏目
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div>
            <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                <div class=" text-center">

                    <div class="card-body">
                        <form action="{{route('admin.category.update',$category)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">栏目名称</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{$category['title']}}" class="form-control" id="inputEmail3" placeholder="栏目名称">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">栏目图标</label>
                                <div class="col-sm-10">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text {{$category['icon']}}" id="icon"></span>
                                        </div>
                                        <input type="text" value="fa fa-hand-grab-o"  readonly name='icon'class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="bt()">选择图标</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button  class="btn btn-primary">栏目提交</button>
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