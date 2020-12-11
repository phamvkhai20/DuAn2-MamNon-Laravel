<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            // 'phone'=>['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'],
            'password'=>'required',
        ];
    }


    public function messages()
    {
        return [
            // 'phone.required'=>'Vui lòng nhập số điện thoại!',
            // 'phone.regex'=>'Số điện thoại không hợp lệ!',
            // 'phone.digits'=>'Số điện thoại phải đúng định dạng!',
            'password.required'=>'Vui lòng nhập mật khẩu!',
        ];
    }
}