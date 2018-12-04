<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtcileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'=>'required',
            'category_id'=>'required',
            'content'=>'required'

        ];
    }
    public function messages()
    {
        return [
          'title.required'=>'标题不能为空',
          'category_id.required'=>'栏目不能不选',
          'content.required'=>'请输入内容',

        ];
    }
}
