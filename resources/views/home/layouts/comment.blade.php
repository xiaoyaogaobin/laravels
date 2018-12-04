<div class="card-body" id="app">
    <!-- Divider -->
    <hr>
    {{--数据循环--}}
    <div class="comment mb-3 " v-for ="v in comments" :id="'comment'+v.id">
        <div class="row">
            <div class="col-auto">

                <!-- Avatar -->
                <a class="avatar" href="profile-posts.html">
                    <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle" >
                </a>

            </div>
            <div class="col ml--2">

                <!-- Body -->
                <div class="comment-body">

                    <div class="row">
                        <div class="col">

                            <!-- Title -->
                            <h5 class="comment-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        @{{v.user.name}}
                                        <a href="" @click.prevent="zan(v)" >👍@{{v.num}}</a>
                                    </font></font></h5>

                        </div>
                        <div class="col-auto">

                            <!-- Time -->
                            <time class="comment-time"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        @{{v.created_at}}
                                    </font></font></time>

                        </div>
                    </div> <!-- / .row -->

                    <!-- Text -->
                    <p class="comment-text" v-html="v.content">

                               </p>

                </div>

            </div>

        </div> <!-- / .row -->
    </div>
    {{--数据循环结束--}}


    <!-- Divider -->
    <hr>
    <!-- Form -->
    <div class="row align-items-start">
        @auth()
        <div class="col-auto">

            <!-- Avatar -->
            <div class="avatar">
                <img src="{{auth()->user()->icon}}" alt="..." class="avatar-img rounded-circle">
            </div>

        </div>

        <div class="col ml--2">

            <!-- Input -->
            <div id="editormd">
                <textarea style="display:none;"></textarea>
            </div>
            <button class="btn btn-primary" @click.prevent = "send()">发表评论</button>
        </div>
            @else
            <p class="text-muted text-center">请 <a href="{{route('userog.login',['form'=>url()->full()])}}">登录</a> 后评论</p>
            @endauth
    </div> <!-- / .row -->
{{--@{{comment}}--}}
    {{--@{{comments}}--}}
</div>
@push('js')
    <script>
        require(['hdjs','vue','axios','MarkdownIt', 'marked', 'highlight'],function(hdjs,Vue,axios,MarkdownIt, marked){
         var vm =   new Vue({
                el:"#app",
                //数据
                data:{

                    comment:{content: ''},// 获取评论数据
                    comments:[], //获取全部评论


                },
                // 方法
                methods:{
                    send(){

                        // alert(1);
                        //判断表单不能为空
                        if(this.comment.content.trim() ==''){
                            hdjs.swal({
                                text: "评论不能为空",
                                button:false,
                                icon:'warning'
                            });
                            return false;
                        }
                        // 提交数据
                        axios.post('{{route('comment.store')}}', {
                            content: this.comment.content,
                            article_id : '{{$article['id']}}',

                        })

                            .then( (response)=> {
                                // console.log(response.data.comment);
                                this.comments.unshift(response.data.comment);
                                //代码高亮
                                let md = new MarkdownIt();

                                response.data.comment.content = md.render(response.data.comment.content);

                                $(document).ready(function () {
                                    $('pre code').each(function (i, block) {
                                        hljs.highlightBlock(block);
                                    });
                                });

                                // 清空里面值
                                this.comment.content='';
                                //选中所有内容
                                editormd.setSelection({line:0, ch:0}, {line:9999999, ch:9999999});
                                //将选中文本替换成空字符串
                                editormd.replaceSelection("");

                            })

                    },
                    zan(v){
                        let url = '/zan/make?type=comments&id='+v.id;
                        // console.log(url);
                        axios.get(url).then(response=>{

                             v.num =response.data.num

                        })
                    }

                },
                //挂载

                mounted(){

                    @auth()
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        toolbarIcons : function() {
                            return [
                                "undo","redo","|",
                                "bold", "del", "italic", "quote","|",
                                "list-ul", "list-ol", "hr", "|",
                                "link", "hdimage", "code-block", "|",
                                "watch", "preview", "fullscreen"
                            ]
                        },
                        //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                        server:'',
                        //editor.md库位置
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",

                        // 监听编辑器变化
                        onchange: function () {
                            //给 vu 对象中 comment 属性中 content 设置值
                            vm.$set(vm.comment, 'content', this.getValue())
                        }

                    });

                    @endauth
                    // 请求接回来数据
                    axios.get('{{route('comment.index',['article_id'=>$article['id']])}}')

                        .then((response) => {
                            // console.log(response);
                            this.comments = response.data.comments;

                            // $("#content").html(md.render($("#content textarea").val()));
                            // 代码转makedow 地方
                            let md = new MarkdownIt();
                            // console.log(this.comments);
                            // $("#content").html(md.render($("#content textarea").val()));

                            this.comments.forEach((v, k) => {

                                v.content = md.render(v.content)


                            });
                            //代码 高亮处理
                            $(document).ready(function () {
                                $('pre code').each(function (i, block) {
                                    hljs.highlightBlock(block);
                                });
                            });


                        })
                },
                // 挂载之后执行
             updated(){
                 hdjs.scrollTo('body',location.hash,1000, {queue:true});
             }

            });
        })
    </script>

    @endpush

