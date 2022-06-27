<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreReturnBookRequest extends FormRequest
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
            'loan_id' => 'required',
            'date_return' => 'required|date|after:yesterday|before:tomorrow',
            'status' => 'required',
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
          'loan_id.required' => 'Loan is required',
          'date_return.required' => 'Date return is required',
          'date_return.after' => 'Make sure today',
          'date_return.before' => 'Make sure today',
          'date_return.date' => 'Date doesnt match today',
          'status' => 'Loan status is required'
        ];
    }
}
