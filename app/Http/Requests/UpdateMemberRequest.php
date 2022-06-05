<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateMemberRequest extends FormRequest
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
            'name' => "required|string",
            'email' => "required|email",
            'gender' => 'required',
            'placeofbirth' => 'required',
            'dateofbirth' => 'required|date',
            'telephone' => 'required'
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
            'name.required' => 'Name is required',
            'name.string' => 'Name must be string',
            'email.required' => 'E-mail is required',
            'email.email' => 'E-mail invalid',
            'placeofbirth.required' => 'Place of birth is required',
            'dateofbirth.required' => 'Date of birth is required',
            'dateofbirth.date' => 'Date invalid',
            'telephone.required' => 'Telephone is required'
        ];
    }
}
