<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePublisherRequest extends FormRequest
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
            'publisher_code' => 'required',
            'publisher_name' => 'required|string'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'messages' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'publisher_code.required' => 'Publisher code is required',
            'publisher_name.required' => 'Publisher name is required',
            'publisher_name.string' => 'Publisher name must be string'
        ];
    }
}
