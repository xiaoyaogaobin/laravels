<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
//        dd($this->route('category'));
//dd($this->route('category'));
        $id = $this->route('category') ? $this->route('category')->id : null;
        return [

            'title'=> 'required|unique:gategories,title'.$id,
            'icon' =>'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '栏目不能为空',
            'title.unique' => '栏目已经存在',
            'icon.required' => '图标不能为空，'
        ];
    }
}
