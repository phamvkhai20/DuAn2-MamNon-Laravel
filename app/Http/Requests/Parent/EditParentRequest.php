<?php

namespace App\Http\Requests\Parent;

use App\Models\Parents;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EditParentRequest extends FormRequest
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
        $segments = request()->segments();
        $parent = Parents::find((int) end($segments));
        if (request('email') == $parent->email && request('phone') == $parent->phone) {
            $email = 'required|email';
            $phone = ['required', 'regex:/^0{1}[3|9]{1}[0-9]{8}/', 'digits:10'];
        } else {
            $email = 'required|email|unique:parents';
            $phone = ['required', 'regex:/^0{1}[3|9]{1}[0-9]{8}/', 'digits:10', 'unique:parents'];
        }
        return [
            'parent_name' => 'required|min:6',
            'email' => $email,
            'phone' => $phone,
            'parent_avatar' => 'mimes:jpeg,jpg,png',
            'parent_status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'parent_name.required' => 'Vui lòng nhập tên giáo viên!',
            'parent_name.min' => 'Tên giáo viên yếu cầu ít nhất 6 ký tự!',

            'email.required' => 'Vui lòng nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'email.unique' => 'Email đã tồn tại!',

            'phone.required' => 'Vui lòng nhập số điện thoại!',
            'phone.regex' => 'Số điện thoại không hợp lệ!',
            'phone.digits' => 'Số điện thoại phải đúng định dạng!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',

            'parent_status.required' => 'Vui lòng chọn trạng thái!',

            'parent_avatar.mimes' => 'Không đúng định dạng ảnh!',
        ];
    }
}