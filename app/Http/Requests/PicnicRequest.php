<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PicnicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:6|unique:picnics,name',
            'time'=>'required',
            'price'=>'required|min:0|numeric',
            'address'=>'required',
            'name_parent'=>'required',
            'description'=>'required',
            'picnic_avatar'=>'required||mimes:jpeg,jpg,png',
        ];
    }
      public function messages(){
        return [
            'name.unique' => 'tên buổi dã ngoại đã tồn tại',
            'name.required' => 'tên buổi dã ngoại không được để trống',
            'name.min' => 'tên sản phẩm không được nhỏ hơn 6 kí tự',
            'time.required' => 'thời gian buổi dã ngoại không được để trống',
            'price.required' =>'chi phí buổi dã ngoại không được để trống',
            'price.min' =>'chi phí buổi dã ngoại phải lớn hơn 0',
            'price.numberic' =>'chi phí buổi dã ngoại phải là số',
            'address.required' => 'địa chỉ buổi dã ngoại không được để trống',
            'name_parent.required' => 'tên phụ huynh đi cùng không được để trống',
            'description.required' => 'mô tả buổi dã ngoại không được để trống',
            'picnic_avatar.required' =>'ảnh buổi dã ngoại không được để trống',
            'picnic_avatar.mimes' =>'ảnh phải đúng định dạng',




        ];
    }
    public function attributes(){
        return [
            'picnic' => 'Buổi dã ngoại',
        ];
    }
}
