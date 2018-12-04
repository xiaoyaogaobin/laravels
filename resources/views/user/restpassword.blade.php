<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/disk/assets')}}/css/theme.min.css">

    <title>重置密码</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                重置密码
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                每天努力一点点,就离成功近一点！
            </p>

            <!-- Form -->
            <form method="post" action="{{route('user.set')}}">
                @csrf

                <!-- Email address -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        手机号码
                    </label>

                    <!-- Input -->
                    <input type="number" name="email" value="461476246@qq.com" class="form-control" placeholder="请输入你的手机号码">

                </div>

                <!-- Password -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        密码
                    </label>

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password" name ='password'class="form-control form-control-appended" placeholder="请输入你的密码">

                        <!-- Icon -->
                        <div class="input-group-append">
                  <span class="input-group-text">

                  </span>
                        </div>

                    </div>
                </div>
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        确认密码
                    </label>

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password" name="password_confirmation" class="form-control form-control-appended" placeholder="请输入你的密码">

                        <!-- Icon -->
                        <div class="input-group-append">
                  <span class="input-group-text">

                  </span>
                        </div>

                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="验证码" name="code"  aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="bt">发送验证码</button>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                    重置密码
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        如果你有账户请? <a href="{{route('userog.login')}}">登录</a>.
                        <a href="{{route('user.register')}}">注册账户</a>
                    </small>
                </div>

            </form>

        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">

            <!-- Image -->
            <div class="bg-cover vh-100 mt--1 mr--3" style="background-image: url({{asset('org/disk/assets')}}/img/covers/auth-side-cover.jpg);"></div>

        </div>
    </div> <!-- / .row -->
</div>

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')
<script>
    require(['hdjs','bootstrap'], function (hdjs) {
        let option = {
            //按钮
            el: '#bt',
            //后台链接
            url: '{{route('code.send')}}',
            //验证码等待发送时间
            timeout: '{{hd_config('code.code_expires')}}',
            //表单，手机号或邮箱的INPUT表单
            input: '[name="email"]'
        };
        hdjs.validCode(option);
    })
</script>

</body>
</html>