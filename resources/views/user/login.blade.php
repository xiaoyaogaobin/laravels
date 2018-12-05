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


    <title>登录</title>
</head>
<body class="d-flex align-items-center bg-white border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-6 offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0">

            <!-- Image -->
            <div class="text-center">
                <img src="{{asset('org/disk/assets')}}/img/illustrations/coworking.svg" alt="..." class="img-fluid">
            </div>

        </div>
        <div class="col-12 col-md-5 col-xl-4 order-md-1 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                欢迎您登录
            </h1>

            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                我们因为有你,所以我们会很幸福.
            </p>

            <!-- Form -->
            <form method="post" action="{{route('user.login',['form'=>Request::query('form')])}}"
                  class="form-horizontal" id="registration-form">
                @csrf
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        手机
                    </label>

                    <!-- Input -->
                    <input type="number" name="email" value="{{old('name')}}" class="form-control"
                           placeholder="请输入你的手机号码"
                           data-validation="custom" data-validation-regexp="^[a-z]{3,}$"
                           data-validation-error-msg="用户名由3位以上字母构成">

                </div>
                <!-- Email address -->


                <!-- Password -->
                <div class="form-group">

                    <!-- Label -->
                    <label>
                        密码
                    </label>

                    <!-- Input group -->
                    <div class="input-group input-group-merge">

                        <!-- Input -->
                        <input type="password" name='password' class="form-control form-control-appended"
                               placeholder="请输入你的密码">

                        <!-- Icon -->
                        <div class="input-group-append">
                  <span class="input-group-text">

                  </span>
                        </div>

                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                    <label class="form-check-label" for="remember">记住我</label>
                </div>


                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3 mt-3">
                    登录
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        如果你没有账户请? <a href="{{route('user.register')}}">注册</a>.<a href="{{route('user.set')}}">重置密码</a>
                    </small>
                </div>

            </form>

        </div>
    </div> <!-- / .row -->
</div> <!-- / .container -->

<!-- JAVASCRIPT
================================================== -->
@include('layouts.hdjs')
@include('layouts.message')



</body>
</html>