<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateLoanRequest extends FormRequest
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
            'loan_detail.book_id' => 'required',
            'loan_detail.total' => 'required',
            'member_id' => 'required',
            'borrow_date' => 'required|date|after:yesterday',
            'long_borrowed' => 'required',
            'description' => 'required',
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
            '*.book_id.required' => 'Book is required',
            '*.total.required' => 'Total is required',
            'member_id.required' => 'Member is required',
            'borrow_date.required' => 'Borrow date is required',
            'borrow_date.date' => 'Borrow date must be date',
            'borrow_date.after' => 'Date must be today or next',
            'long_borrowed.required' => 'Long borrowed is required',
            'description.required' => 'Description is requried',
            'status.required' => 'Status is required'
        ];
    }
}
