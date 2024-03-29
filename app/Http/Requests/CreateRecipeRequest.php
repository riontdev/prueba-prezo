<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRecipeRequest extends FormRequest
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
            'products' => 'required|array',
            'products.*.product_id' => 'required|integer|exists:products,id',
            'products.*.gross_quantity' => 'required|numeric|min:1',
            'products.*.net_quantity' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'El :attribute es requerido.',
            '*.string' => 'El :attribute  debe ser una cadena de texto.',
            '*.integer' => 'El :attribute  debe ser entero',
            '*.numeric' => 'El :attribute  debe ser una numerico',
            '*.max' => 'El :attribute no puede exceder los 100 caracteres.',
            '*.min' => 'El :attribute debe ser mas de 0.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => true, 'message' => $validator->errors()->all()], 400));
    }//end failedValidation()
}
