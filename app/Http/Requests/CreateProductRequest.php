<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'unit_price' => 'required|numeric|min:1',
            'unit' => 'required|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'El :attribute es requerido.',
            '*.string' => 'El :attribute  debe ser una cadena de texto.',
            '*.numeric' => 'El :attribute  debe ser numerico',
            '*.max' => 'El :attribute no puede exceder los 100 caracteres.',
            '*.min' => 'El :attribute debe ser mas de 0.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => true, 'message' => $validator->errors()->all()], 400));
    }//end failedValidation()
}
