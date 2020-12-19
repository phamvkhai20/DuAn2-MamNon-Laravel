<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'oldpass'=>'required|min:6',
            'password'=>'required|min:6',
            'cfpass' => 'required|same:password'

        ];
    }
    public function messages()
    {
        return [
            'oldpass.required'=>'Vui lòng nhập mật khẩu cũ!',
            'password.required'=>'Vui lòng nhập mật khẩu mới!',
            'password.min'=>'Mật khẩu không được dưới 6 ký tự',
            'cfpass.required'=>'Vui lòng xác nhận mật khẩu!',
            'cfpass.same'=>'Xác nhận mật khẩu không khớp!',
        ];
    }
}
