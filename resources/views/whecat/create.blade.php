@extends('admin.layouts.adminexendx')
@section('content')
    <div id="app">
    <div class="row" >
        <div class="col-12 col-lg-6 col-xl">

            <!-- Card -->
            <div class="card">
                <div class="card-body ">
                    <div class="row align-items-center text-center ">
                        <div class="col ">
                            <!-- Badge -->
                            <a href="{{route('wechat.button.index')}}"> <span class="h2 mb-0 text-black-50">
                      菜单列表
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
                            <a href="{{route('wechat.button.create')}}">
                               <span class="h2 text-success">
                      添加菜单
                             </span>
                            </a>
                            <!-- Badge -->


                        </div>

                    </div> <!-- / .row -->

                </div>
            </div>

        </div>

    </div> <!-- / .row -->
    <div class="row ml-5" >
        <div class="col-3">

            <div class="mobile-container">
                <div class="bgtop">
                    <div class="mobile-hd ng-binding">默认菜单</div>
                </div>
                {{--底部菜单--}}
                <div class="menu_forter">
                    {{--循环所有--}}
                    <dl v-for="(v,k) in menus.button">
                        {{--一级菜单--}}
                        <dt @click="editCurrentMenu(v)" >
                            <span @click.stop="delTopMenu(k)" class="fa fa-minus-square"></span>
                            @{{v.name}}
                        </dt>
                        {{--二级循环--}}
                        <dd v-for="(m,n) in v.sub_button" @click="editCurrentMenu(m)" >
                            <span  @click="delSubMenu(v,n)" class="fa fa-minus-square"></span>
                            @{{ m.name }}
                        </dd>
                        {{--二级添加--}}
                        <dd @click="addSubMenu(v)" v-if="v.sub_button.length<5" >
                            <span class="fa fa-plus-square"></span>
                        </dd>
                    </dl>

                    <dl v-if="menus.button.length<3">
                        <dt @click="addTopMenu">
                            <span class="fa fa-plus-square"></span>
                        </dt>
                    </dl>


                </div>
            </div>


        </div>

        <div class="col-9">
            <div class="form_bg">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-12">

                            <form method="post" action="{{route('wechat.button.store')}}">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">菜单标题</label>
                                            <input type="text" name="title" id="exampleInputEmail1" placeholder=""
                                                   class="form-control" >
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputEmail1">菜单名称</label>
                                            <input type="text"  id="exampleInputEmail1" placeholder=""
                                                   class="form-control" v-model="currentMenu.name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">属性</label>
                                            <div class="form-check form-check-inline">
                                                <input value="view" type="radio" class="form-check-input" v-model="currentMenu.type">
                                                <label for="inlineRadio1" class="form-check-label">链接</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" value="click" name="inlineRadioOptions"v-model="currentMenu.type"
                                                       id="inlineRadio2" class="form-check-input">
                                                <label for="inlineRadio2" class="form-check-label">关键词</label>
                                            </div>
                                        </div>
                                        <div class="form-group" v-if="currentMenu.type == 'view'">
                                            <label for="exampleInputEmail1" >链接</label>
                                            <input type="text" id="exampleInputEmail1" placeholder=""
                                                   class="form-control" v-model="currentMenu.url">
                                        </div>

                                        <div class="form-group" v-if="currentMenu.type == 'click'">
                                            <label for="exampleInputEmail1" >关键字</label>
                                            <input type="text" id="exampleInputEmail1" placeholder=""
                                                   class="form-control" v-model="currentMenu.key">
                                        </div>
                                        <button type="submit" class="btn btn-primary">保存</button>
                                        <textarea name="data" hidden id="" cols="30" rows="10">@{{ menus }}</textarea>
                                    </div>

                                </div>
                                @{{currentMenu}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div> <!-- / .row -->
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{asset('wechat/wechat.css')}}">
@endpush()
@push('javascript')
    <script>
      require(['hdjs','vue'],function (hdjs,Vue) {
          new  Vue({
              el:'#app',
              data:{
                  //当前编辑菜单信息

                  currentMenu:{},
                  // 全部数据
                  menus:{
                      "button":[

                      ]
                  }
              },
              // 执行方法
              methods: {
                  // 添加一级菜单
                  addTopMenu(){
                        var html = {type: 'click',name: '一级', key: '',sub_button:[]};
                        this.menus.button.push(html);
                        this.currentMenu = html;

                    },
                    // 添加二级菜单
                  addSubMenu(v){
                      var html = {type: 'click', name: '二级', key: ''}
                      v.sub_button.push(html);
                      this.currentMenu = html;
                  },
                  // 删除一级菜单
                  delTopMenu(k){
                      this.menus.button.splice(k,1)
;                  },
                    //删除二级菜单
                  delSubMenu(v,n){
                      v.sub_button.splice(n,1);
                  },
                  //编辑
                  //编辑当前菜单
                  editCurrentMenu(v){
                      this.currentMenu = v;
                  }
              }
          })

      })
    </script>
@endpush()