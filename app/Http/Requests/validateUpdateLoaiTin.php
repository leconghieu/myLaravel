<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateUpdateLoaiTin extends FormRequest
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
            'maloai' => 'required|max:10|unique:loaitin,maloai,'.$this->id_loai . ',id_loai',
            'tenloai' => 'required|max:100|unique:loaitin,tenloai,'.$this->id_loai .',id_loai'
        ];
    }
    public function messages()
    {
        return [
            'maloai.unique' => 'Mã loại đã tồn tại',
            'maloai.required' => 'Không được để trống mã loại',
            'tenloai.unique' => 'Tên loại đã tồn tại',
            'tenloai.required' => 'Không được để trống tên loại'
        ];
    }
}
