<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return arrayame
     */
    public function rules()
    {

     
        return [
            'name'    =>'required' ,
            'email'   =>'unique:users|numeric|' ,
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

                } ,

            ] ,

        ];


    }
    public  function  messages()
    {
        return [
            'name.required' => '请输入用户名',
            'email.numeric'   => '请输入手机号',
            'email.unique'   => ' 该邮箱已经存在',
            'password.required'   => '请输入密码',
            'password.min'   => '密码不得少于3位',
            'password.confirmed'   => '两次输入密码不一致',
            'code.required'=>'验证码不能为空',




        ];
    }

}


