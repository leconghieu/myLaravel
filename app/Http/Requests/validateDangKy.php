<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateDangKy extends FormRequest
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
            'name' => 'required|max:100|unique:user_lists',
            'password' => 'required|max:100',
            'email' => 'required|max:100|unique:user_lists',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Không được bỏ trống tên đăng nhập',
            'name.max' => 'Tên đăng nhập không được dài quá 100 ký tự',
            'name.unique' => 'Tên đăng nhập đã tồn tại trong hệ thống',
            'password.required' => 'Không được để trống password',
            'password.max' => 'Password không được quá 100 ký tự',
            'email.required' => 'Không được để trống email',
            'email.max' => 'Email không được dài quá 100 ký tự',
            'email.unique' => 'Email đã tồn tại trong hệ thống',
        ];
    }
}
