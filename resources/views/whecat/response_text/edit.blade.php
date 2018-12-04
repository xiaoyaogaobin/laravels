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
                            <form action="{{route('wechat.response_text.update',$responseText)}}" method="post">
                                @csrf @method('PUT')
                                {!! $ruleView!!}

                                <div class="card" id="keywords">
                                    <span for="inputEmail3" class="col-sm-2 col-form-label ml--3 mt-3">回复内容</span>
                                    <div class="card-body" id="key-text">

                                        {{--添加关键字--}}
                                        <div class="input-group mb-3 mt-3" v-for="(v,k) in contents">
                                            <div class="input-group-prepend">
                                                 <span class="input-group-text" >表情</span>
                                            </div>
                                            <textarea class="form-control" v-model="v.content"></textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text" style="cursor: pointer;" @click="del(k)">删除</span>
                                            </div>
                                        </div>

                                        <textarea name="data" hidden cols="30" rows="10">@{{ contents }}</textarea>
                                        {{--添加关键字结束--}}

                                        <div class="card-footer">
                                            <button type="button" @click="add()" class="btn btn-success float-right">
                                                添加回复内容
                                            </button>
                                        </div>
                                    </div>
                                </div>

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
@push('javascript')
    <script>
        require(['vue', 'hdjs'], function (Vue, hdjs) {
            new Vue({
                el: '#keywords',
                data: {
                    contents:{!! $responseText['content'] !!}

                },
                mounted() {
                    this.emotion();
                },
                updated() {
                    this.emotion();
                },
                // 方法
                methods: {
                    emotion() {
                       var _this= this;
                        $('#keywords textarea').each(function () {
                            hdjs.emotion({
                                //点击的元素，可以为任何元素触发
                                btn: $(this).prev('.input-group-prepend').find('span'),
                                //选中图标后填入的文本框
                                input: $(this),
                                //选择图标后执行的回调函数
                                callback: function (con, btn, input) {
                                    //con 是表情内容
                                    //btn 是 当前触发的元素
                                    //input 是文本域

                                    // let index = $(input).index('#keyword-textarea textarea');
                                    let index = $(input).index('#key-text textarea')
                                    _this.contents[index].content = input.val();
                                }
                            })
                        })

                    },

                    //添加
                    add() {
                        this.contents.push({content: ''});
                    },
                    //删除
                    del(k) {
                        this.contents.splice(k, 1);
                    }
                }


            })

        });
        //上传图片

        //移除图片


    </script>
@endpush