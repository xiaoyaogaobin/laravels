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
                                上传配置
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
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">上传大小</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="size" value="{{$config['data']['size']??''}}" class="form-control" id="inputEmail3" placeholder="栏目名称">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">上传类型</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="type" class="form-control" value="{{$config['data']['type']??''}}" id="inputEmail3" placeholder="栏目名称">
                                        <span class="help-block text-muted">类型如:jpg|png</span>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">上传宽高</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="maxnum" class="form-control" value="{{$config['data']['maxnum']??''}}" id="inputEmail3" placeholder="栏目名称">
                                        <span class="help-block text-muted">类型如:200|200</span>
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