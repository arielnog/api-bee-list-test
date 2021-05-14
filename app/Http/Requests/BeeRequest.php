<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeeRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'scientific_name' => 'required',
            'description' => 'required',
            'photo_path' => 'file|image|size:5242880',
            'month_id' => 'array|required',
            'bee_id' => 'array|required'
        ];
        return $rules;
    }

    public function messages()
    {
        $messages = [
        ];

        return $messages;
    }
}
