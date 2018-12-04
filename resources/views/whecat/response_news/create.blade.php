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
                                回复添加
                            </h4>

                        </div>
                        <div class="col-auto">

                            <!-- Button -->
                            <a href="{{route('wechat.response_text.index')}}" class="btn btn-sm btn-white">
                                返回栏目
                            </a>

                        </div>
                    </div> <!-- / .row -->
                </div>
                <div class="table-responsive mb-0" data-toggle="lists"
                     data-lists-values='["goal-project", "goal-status", "goal-progress", "goal-date"]'>
                    <div class=" text-center">

                        <div class="card-body">
                            <form action="{{route('wechat.response_news.store')}}" method="post">
                                @csrf
                                {!! $ruleView!!}

                                {{--图文回复开始--}}
                                <div class="card" id="app">
                                <div class="card-body">
                                    <div class="row">
                                        {{--左边图片--}}
                                        <div class="col-3">
                                                <div class="news">
                                                    <img :src="news.picurl" alt="">
                                                    <p>@{{news.title}}</p>
                                                </div>
                                        </div>
                                        {{--右边图文框--}}
                                        <div class="col-9">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">图文名称</label>
                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="news.title" id="inputEmail3" placeholder="图文名称" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">图文描述</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" >@{{news.discription}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">选择图片</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group mb-1">
                                                        <input class="form-control  form-control" v-model="news.picurl" name="thumb" readonly="" value="">
                                                        <div class="input-group-append">
                                                            <button @click="upImagePc" class="btn btn-secondary" type="button">单图上传</button>
                                                        </div>
                                                    </div>
                                                    <div style="display: inline-block;position: relative;">
                                                        <img :src="news.picurl" class="img-responsive img-thumbnail" width="150">
                                                        <em class="close" style="position: absolute;top: 3px;right: 8px;" title="删除这张图片"
                                                            onclick="removeImg(this)">×</em>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">跳转url</label>
                                                <div class="col-sm-10">
                                                    <input type="text"  v-model="news.url" id="inputEmail3" placeholder="跳转url" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <textarea  class="form-control" name="data"> @{{news}}</textarea>
                                    </div>

                                </div>
                                </div>
                                {{--图文结束--}}
                                <div class="card-footer">
                                    <button class="btn btn-info">提交</button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div> <!-- / .row -->

@endsection
@push('css')
    <style>
        .news{
            border: 1px solid #2c2c2c;
        }
        .news img{
            width: 100%;
        }
        .news p {
            background-color: #0C9A9A;
            padding: 10px;
            margin: 0;
            color: #fffffc;
            font-size: 18px;
        }


    </style>
    @endpush
@push('javascript')
    <script>

        require(['vue','hdjs'],function (Vue,hdjs) {
            new  Vue({
                el:'#app',
                data:{
                    news:{
                        'title':'这里是标题',
                        'discription':'这里是描述',
                        'picurl':"{{asset('org/hdjs/image/nopic.jpg')}}",
                        'url':'http:baidu.com'
                    }
                },
                methods:{

                    upImagePc(){
                        let _this= this;
                    hdjs.image(function (images) {
                    //上传成功的图片，数组类型
                    _this.news.picurl =images[0];
                })
                    }
                }
            })
        })

    </script>
@endpush