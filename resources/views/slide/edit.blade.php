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
                                轮播图修改
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('slide.index')}}" class="btn btn-sm btn-white">
                                返回栏目
                            </a>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive mb-0" data-toggle="lists" data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                    <div class=" text-center">

                        <div class="card-body">
                            <form action="{{route('slide.update',$slide)}}" method="post">
                                @csrf @method('PUT')
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">网址</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="website" value="{{$slide->website}}" class="form-control" id="inputEmail3" placeholder="栏目名称">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">广告词</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="introduce" value="{{$slide->introduce}}"class="form-control" id="inputEmail3" placeholder="栏目名称">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="input-group mb-1">
                                        <input class="form-control  form-control-sm" value="{{$slide->picture}}" name="picture" readonly="" value="">
                                        <div class="input-group-append">
                                            <button onclick="upImagePc(this)" class="btn btn-secondary btn-sm" type="button">图片上传</button>
                                        </div>

                                    </div>


                                </div>

                                <button  class="btn btn-primary">图片修改</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div> <!-- / .row -->

@endsection
@push('javascript')
    <script>
        require(['hdjs','bootstrap']);
        //上传图片
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    $("[name='picture']").val(images[0]);
                    //将上传返回的图片写入avatar-img元素的src
                    $(".img-responsive").attr('src', images[0]);
                    //图片上传修改
                }, options)
            });
        }


    </script>
@endpush