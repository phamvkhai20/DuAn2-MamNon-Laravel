<?php

namespace App\Http\Requests\Teacher;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class EditTeacherRequest extends FormRequest
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
        $teacher = Teacher::find((int) end($segments));
        if(request('email') == $teacher->email && request('phone') == $teacher->phone){
            $email ='required|email';
            $phone =['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'];
        }else{
            $email ='required|email|unique:teachers';
            $phone =['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10','unique:parents'];
        }
        return [
            'fullname'=>'required|min:6',
            'email'=>$email,
            'phone' => $phone,
            'date_of_birth'=>'required',
            'gender'=>'required',
            'avatar'=>'mimes:jpeg,jpg,png',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'Vui lòng nhập tên giáo viên!',
            'fullname.min'=>'Tên giáo viên yêu cầu tối thiểu 6 ký tự!',

            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Email không đúng định dạng!',
            'email.unique'=>'Email đã tồn tại!',
            
            
            'phone.required'=> 'Vui lòng nhập số điện thoại!',
            'phone.regex'=>'Số điện thoại không hợp lệ!',
            'phone.digits'=>'Số điện thoại phải đúng định dạng!',
            'phone.unique'=>'Số điện thoại đã tồn tại!',

            'date_of_birth.required'=>'Vui lòng chọn ngày sinh!',

            'gender.required'=>'Vui lòng chọn giới tính!',

            'date_of_birth.required'=>'Vui lòng chọn ngày sinh!',

            'avatar.mimes'=>'Không đúng định dạng ảnh!',
        ];
    }
}
