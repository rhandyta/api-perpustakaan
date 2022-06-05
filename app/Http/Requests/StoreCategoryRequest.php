<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCategoryRequest extends FormRequest
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
            'category_code' => 'required|unique:categories,category_code',
            'category_name' => 'required|string|unique:categories,category_name'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'category_code.required' => 'Category code is required',
            'category_code.unique' => 'Category code already exists',
            'category_name.required' => 'Category name is required',
            'category_name.string' => 'Category name must be string',
            'category_name.unique' => 'Category name already exists'
        ];
    }

}
