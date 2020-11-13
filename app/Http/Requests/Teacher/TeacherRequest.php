<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class TeacherRequest extends FormRequest
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
            'fullname'=>'required|min:6',
            'email'=>'required|email|unique:teachers',
            'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            'date_of_birth'=>'required',
            'gender'=>'required',
            'teacher_type_id'=>'required',
            'avatar'=>'required||mimes:jpeg,jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập tên giáo viên!',
            'fullname.min'=>'Tên giáo viên yếu cầu ít nhất 6 ký tự!',

            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Email không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            
            'phone.required'=> 'Vui lòng nhập số điện thoại!',
            // 'phone.regex'=>'Số điện thoại không hợp lệ!',
            // 'phone.digits'=>'Số điện thoại phải đúng định dạng!',

            'date_of_birth.required'=>'Vui lòng chọn ngày sinh!',

            'gender.required'=>'Vui lòng chọn giới tính!',

            'teacher_type_id.required'=>'Vui lòng chọn vai trò!',

            'date_of_birth.required'=>'Vui lòng chọn ngày sinh!',

            'avatar.required'=>'Vui lòng chọn ảnh đại diện!',
            'avatar.mimes'=>'Không đúng định dạng ảnh!',
        ];
    }
}
