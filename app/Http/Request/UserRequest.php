<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => 'required|min:3',
            'password' => 'required',
        ];
    }
    public function messages(){
        return[
            'name.required' => 'Nhập name vào',
            'name.min' => 'Tên quá ngắn',
            'price.required' => 'Bắt buộc nhập mat khau',
             
        ];
    }
}
