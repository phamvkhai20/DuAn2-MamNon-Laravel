<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClassRequest extends FormRequest
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
            'name'=>'required|min:6'

        ];
    }
    public function messages(){
        return[
            'name.required'=>'Vui lòng nhập tên lớp',
            'name.min'=>'Tên lớp yêu cầu ít nhất 6 kí tự',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên lớp',
        ];
    }
}
