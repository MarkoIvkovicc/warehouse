<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProducts extends FormRequest
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
            'name' => 'required|min:3|unique:products',
            'description' => 'required|min:10',
            'price' => 'required|integer|min:0',
            'stock' => 'integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }
}
