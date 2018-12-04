<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {


        return [

            'email'   =>'required' ,
            'password'=>'required|min:3|confirmed' ,
            'code'    =>[
                'required' ,
                //使用表单验证--自定义验证规则--使用闭包
                //$value 表单提交过来的code对应的值
                function( $attribute , $value , $fail ){
                    if( $value != session( 'code.code' ) ){
                        $fail( '验证码不正确' );
                    }
                    if (time()>=session('code.time')){
                        $fail('你的验证码已经过期');
                    }
                    //自定义正则验证规则
                    //$preg = '/\d/';
                    //if(!preg_match($preg,$value)){
                    //	$fail( '验证码不正确' );
                    //}

                } ,

            ] ,

        ];


    }
    public  function  messages()
    {
        return [

            'email.required'   => '手机号不能为空',
            'password.required'   => '请输入密码',
            'password.min'   => '密码不得少于3位',
            'password.confirmed'   => '两次输入密码不一致',




        ];
    }

}

