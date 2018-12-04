@extends('home.layouts.message')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">

                <!-- Header -->
                <div class="header mt-md-5">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Pretitle -->


                                <!-- Title -->
                                <h1 class="header-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                            文章添加
                                        </font></font></h1>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>

                <!-- Form -->
                <form class="mb-4" method="post" action="{{route('article.article.store')}}">
                        @csrf
                    <!-- Project name -->
                    <div class="form-group">
                        <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    文章标题
                                </font></font></label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control">
                    </div>





                            <div class="form-group">

                                <div class="input-group mb-1">
                                    <input class="form-control  form-control-sm" name="background" readonly="" value="">
                                    <div class="input-group-append">
                                        <button onclick="upImagePc(this)" class="btn btn-secondary btn-sm" type="button">封面上传</button>
                                    </div>

                                </div>
                                <div style="display: inline-block;position: relative;">
                                    <img src="{{asset('svg/tpzs.jpg')}}" class="img-responsive img-thumbnail" width="150">
                                    <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                        onclick="removeImg(this)">×</em>
                                </div>

                            </div>










                    <!-- Project description -->

                    <div class="form-group">
                        <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    文章栏目
                                </font></font></label>
                        <select class="form-control "  data-toggle="select" data-minimum-results-for-search="-1" name="category_id">
                            <option >
                                请选择栏目
                            </option>
                            @foreach($gategorie as $v)
                            <option value="{{$v->id}}">
                                {{$v->title}}
                            </option>
                                @endforeach
                        </select>
                    </div>

                    <!-- Project tags -->

                    <div class="form-group">
                        <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    内容添加
                                </font></font></label>
                        <div id="editormd">
                            <textarea style="display:none;" name="content">{{old('content')}}</textarea>
                        </div>
                    </div>

                    <button  class="btn btn-block btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                文章添加
                            </font></font></button>

                </form>

            </div>
        </div> <!-- / .row -->
    </div>

@endsection

@push('js')
<script>
    require(['hdjs'], function (hdjs) {
        hdjs.editormd("editormd", {
            width: '100%',
            height: 300,
            toolbarIcons : function() {
                return [
                    "bold", "del", "italic", "quote","|",
                    "list-ul", "list-ol", "hr", "|",
                    "link", "hdimage", "code-block", "|",
                    "watch", "preview", "fullscreen"
                ]
            },
            //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
            server:'',
            //editor.md库位置
            path: "{{asset('org/hdjs')}}/package/editor.md/lib/"
        });
    });
</script>
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
                $("[name='background']").val(images[0]);
                //将上传返回的图片写入avatar-img元素的src
                $(".img-responsive").attr('src', images[0]);
                //图片上传修改
            }, options)
        });
    }
    //移除图片
    function removeImg(obj) {
        $(obj).prev('img').attr('src', '../../svg/tpzs.jpg');
        $(obj).parent().prev().find('input').val('');
    }

</script>
@endpush