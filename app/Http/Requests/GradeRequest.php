<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GradeRequest extends FormRequest
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
            'grade'=>'required|min:5|unique:grades,grade'
        ];
    }
    public function messages(){
        return[
            'grade.required'=>'Vui lòng nhập tên khối',
            'grade.min'=>'Tên khối yêu cầu ít nhất 5 kí tự',
            'grade.unique' => 'Tên khối bị trùng' ,
        ];
    }
    public function attributes(){
        return [
            'grade' => 'Tên khối',
        ];
    }
}
