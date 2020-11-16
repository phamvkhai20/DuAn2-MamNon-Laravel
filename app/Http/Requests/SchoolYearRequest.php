<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolYearRequest extends FormRequest
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
            'school_year'=>['required','regex:/[0-9]/','unique:grades,grade'],
        ];
    }
    public function messages(){
        return[
            'school_year.required'=>'Vui lòng nhập Năm học',
            'school_year.min'=>'Năm học yêu cầu ít nhất 4 kí tự',
            'school_year.unique' => 'Năm học bị trùng' ,
        ];
    }
     public function attributes(){
        return [
            'gschool_yearrade' => 'Năm học',
        ];
    }
}
