<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Notification extends FormRequest
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
            'title'=>'required|min:5',
            'range'=>'required',
            'note'=>'required'

        ];
    }
    public function messages(){
        return[
            'title.required'=>'Vui lòng nhập tiêu đề',
            'title.min'=>'Tên tiêu đề yêu cầu ít nhất 5 kí tự',
            'note.required'=>'Vui lòng nhập tiêu đề',
            'range.required'=>'Vui lòng nhập tiêu đề',
        ];
    }
    public function attributes(){
        return [
            'grade' => 'Tên khối',
        ];
    }
}
