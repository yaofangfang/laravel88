<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
        // return [
        //     'username' => 'required|unique:user|max:30|min:3',
        //     'age'=>'required|integer',
        // ];
    }
    public function messages(){
        // return [
        //     'username.required' => '用户名不能为空',
        //     'username.unique'=>'用户名已存在',
        //     'age.required' => '年龄不能为空',
        // ];
    }
}
