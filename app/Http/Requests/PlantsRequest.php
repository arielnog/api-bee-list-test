<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlantsRequest extends FormRequest
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
            'photo_path' => 'file|image',
            'month_id' => 'array|required',
            'bee_id' => 'array|required'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = [
                'photo_path' => 'file|image|size:5242880',
                'month_id' => 'array',
                'bee_id' => 'array'
            ];
        }

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors(); // Here is your array of errors
        $response = response()->json([
            "message" => "Erro no envio de dados",
            "details" => $errors->messages()
        ], 422);
        throw new HttpResponseException($response);
    }
}
