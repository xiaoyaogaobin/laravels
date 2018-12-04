<div id="rule">
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">规则名称</label>
    <div class="col-sm-10">
        <input type="text" v-model="rule.name" name="name"  class="form-control" id="inputEmail3" placeholder="规则名称">
    </div>
</div>
<div class="card">
    <span for="inputEmail3" class="col-sm-2 col-form-label ml--3 mt-3">关键词</span>
    <div class="card-body">
        {{--添加关键字--}}
        <div class="input-group mb-3 mt-1" v-for="(v,k) in rule.keywords">
            <input type="text" name="key" v-model="v.key" class="form-control">
            <div class="input-group-append">
                <span class="input-group-text" @click="del(k)" style="cursor: pointer;">删除</span>
            </div>
        </div>



        <textarea  hidden name="rule" id="" cols="30" rows="10">@{{ rule }}</textarea>
        {{--添加关键字结束--}}
    </div>
    <div class="card-footer">
        <button type="button" @click="add()" class="btn btn-success float-right">添加关键字</button>
    </div>
</div>

</div>
@push('javascript')
    <script>
        require(['vue'],function (Vue) {
            new Vue({
                el:'#rule',
                data:{
                    rule:{!! json_encode($ruleDate) !!}
                    // rule:{
                    //
                    //     name: '',
                    //     keywords:[
                    //
                    //     ]
                    // }
                },
                methods:{
                    //追加元素
                    add(){
                        this.rule.keywords.push({key:''});
                    },
                    // 删除元素
                    del(k){
                        this.rule.keywords.splice(k,1);
                    }


                }
            })
        })
    </script>
    @endpush