<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateFormTintuc extends FormRequest
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
            'tieude' => 'required|max:100',
            'tomtat' => 'required|max:200',
            'noidung' => 'required|min:10',
            'loaitin' => 'required',
            'pic' => 'required|image'
        ];
    }

    public function messages()
    {
        return  [
            'tieude.required' => 'Chưa nhập tiêu đề',
            'tieude.unique' => 'Tiêu đề bài viết này đã tồn tại',
            'tomtat.required' => 'Chưa nhập phần tóm tắt trong cho bài viết',
            'tomtat.max' => 'Tóm tắt nội dung không được dài quá 200 ký tự',
            'noidung.required' => 'Không được bỏ trống phần nội dung',
            'noidung.min' => 'Nội dung ít nhất phải có 1000 ký tự',
            'loaitin' => 'Không được bỏ trống loại tin',
            'pic.required' => 'Cần chọn 1 hình ảnh làm thumpnail',
            'pic.image' => 'Thumbnail phải là 1 hình ảnh'
        ];
    }
}
