@extends('home.layouts.message')
@section('content')
    <div class="main-content">
        <div class="container mt-5">
            <div class="row">
                @include('member.layouts.message')
                <div class="col-sm-9">
                    <div class="row justify-content-center  __web-inspector-hide-shortcut__">


                        <input type="hidden" name="_method" value="PUT">            <div class="card">
                            <div class="card-header">
                                <h4>头像设置</h4>
                            </div>
                            <div class="card-body  text-center">

                                <div class="avatar avatar-xxl mb-2" style="cursor: pointer" onclick="upImagePc(this)">
                                    <img src="{{$user->icon}}" alt="..." class="avatar-img rounded-circle">
                                </div>
                                <br>
                                <span class="help-block text-muted small">请上传 500X500 像素并小于200KB的JPG图片</span>
                            </div>
                        </div>
                        <form action="{{route('member.user.update',$user)}}" method="post" class="col-sm-8" id="form-icon">
                            @csrf @method('PUT')
                            <input type="hidden" name="icon" value="{{$user->icon}}">
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
@push('js')
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
                    $("[name='icon']").val(images[0]);
                    //将上传返回的图片写入avatar-img元素的src
                    $(".avatar-img").attr('src', images[0]);
                    //图片上传修改
                    $("#form-icon").submit();
                }, options)
            });
        }
        //移除图片

    </script>
    @endpush