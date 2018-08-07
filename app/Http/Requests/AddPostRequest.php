<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ];
    }
    public function messages(){
        return[
            'title.required' => 'Nhập title vào',
            'description.required' => 'Nhập description vào',
            'content.required' => 'Nhập content vào',
             'slug.required' => 'Nhập slug vào', 
        ];
    }
}
