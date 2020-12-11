<?php

namespace App\Http\Requests\Kid;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class KidRequest extends FormRequest
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
        if(request('check') == true ){
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
                'kid_avatar'=>'required||mimes:jpeg,jpg,png',
            ];
        }
        else{
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
                'kid_avatar'=>'required||mimes:jpeg,jpg,png',
    
                'parent_name'=>'required|min:6',
                'phone' => ['required','regex:/^0{1}[3|9]{1}[0-9]{8}/','digits:10'.'unique:parents'],
                'email' => 'required|email|unique:parents',
                'parent_avatar'=>'required||mimes:jpeg,jpg,png',
            ];
        }
        
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
            'kid_avatar.required'=>'Vui lòng chọn ảnh đại diện của trẻ!',
            'kid_avatar.mimes'=>'Không đúng định dạng ảnh!',

            'parent_name.required'=>'Vui lòng nhập tên của phụ huynh!',
            'parent_name.min'=>'Tên của phụ huynh yếu cầu tối thiểu 6 ký tự!',
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
