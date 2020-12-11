<?php

namespace App\Http\Requests\Parent;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class ParentRequest extends FormRequest
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
            'parent_name'=>'required|min:6',
            'email'=>'required|email|unique:teachers',
            'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10','unique:parents'],
            'parent_avatar'=>'required|mimes:jpeg,jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'parent_name.required'=>'Vui lòng nhập tên giáo viên!',
            'parent_name.min'=>'Tên giáo viên yếu cầu ít nhất 6 ký tự!',

            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Email không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            
            'phone.required'=> 'Vui lòng nhập số điện thoại!',
            'phone.regex'=>'Số điện thoại không hợp lệ!',
            'phone.digits'=>'Số điện thoại phải đúng định dạng!',
            'phone.unique'=>'Số điện thoại đã tồn tại!',

            'parent_avatar.required'=>'Vui lòng chọn ảnh đại diện!',
            'parent_avatar.mimes'=>'Không đúng định dạng ảnh!',
        ];
    }
}