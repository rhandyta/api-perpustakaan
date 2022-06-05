<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBookRequest extends FormRequest
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
            'category_id' => 'required',
            'publisher_id' => 'required',
            'title' => 'required',
            'isbn' => 'required',
            'author' => 'required',
            'synopsis' => 'required',
            'numberofpages' => 'required',
            'stock' => 'required',
            'publication_year' => 'required'
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
            'category_id.required' => 'Category is required',
            'publisher_id.required' => 'Publisher is required',
            'title.required' => 'Title is required',
            'isbn.required' => 'ISBN is required',
            'author' => 'Author is required',
            'synopsis.required' => 'Synopsis is required',
            'numberofpages.required' => 'Number of pages is required',
            'stock.required' => 'Stock book is required',
            'publication_year.required' => 'Publication Year book is required',
        ];
    }
}
