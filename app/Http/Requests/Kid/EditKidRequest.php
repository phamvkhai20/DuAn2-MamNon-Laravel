<?php

namespace App\Http\Requests\Kid;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class EditKidRequest extends FormRequest
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
                'kid_name'=>'required|min:6',
                'nickname'=>'required',
                'gender'=>'required',
                'date_of_birth'=>'required',
                'address'=>'required',
                'admission_date'=>'required',
                'class_id'=>'required',
                'admission_date'=>'required',
                'description'=>'required',
                'kid_avatar'=>'mimes:jpeg,jpg,png',
            ];
        
    }
    public function messages()
    {
        return [
            'kid_name.required'=>'Vui lòng nhập tên của trẻ!',
            'kid_name.min'=>'Tên của trẻ yếu cầu tối thiểu 6 ký tự!',
            'nickname.required'=>'Vui lòng nhập nickname của trẻ!',
            'gender.required'=>'Vui lòng chọn giới tính!',
            'date_of_birth.required'=>'Vui lòng chọn ngày sinh!',
            'admission_date.required'=>'Vui lòng chọn ngày nhập học!',
            'address.required'=>'Vui lòng nhập địa chỉ!',
            'class_id.required'=>'Vui lòng chọn lớp!',
            'description.required'=>'Vui lòng thêm chi tiết về trẻ',
            'kid_avatar.mimes'=>'Không đúng định dạng ảnh!',
        ];
    }
}
