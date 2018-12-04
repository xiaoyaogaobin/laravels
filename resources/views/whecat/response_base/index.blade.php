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
                           <a href="{{route('wechat.button.index')}}"> <span class="h2 mb-0 text-success" >
                      菜单列表
                    </span>
                           </a>
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
                                菜单列表
                            </h4>

                        </div>

                    </div> <!-- / .row -->
                </div>

            </div>
            <div class="card">
            <div class="card-body">
                <form action="{{route('wechat.response_base.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">关注回复</label>
                        <div class="col-sm-10">

                            <input type="text" name="subscribe" value="{{$field['data']['subscribe']}}" id="inputEmail3"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">默认回复</label>
                        <div class="col-sm-10">
                            <input type="text" name="default" id="inputEmail3" value="{{$field['data']['default']}}"placeholder="默认回复" class="form-control">
                        </div>
                    </div>


                    {{--图文结束--}}
                    <div class="card-footer">
                        <button class="btn btn-info">提交</button>
                    </div>

                </form>

            </div></div>
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