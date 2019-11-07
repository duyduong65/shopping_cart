<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'productName' => "required|min:3|max:50",
            'productPrice' => "required|max:9",
            'productOrigin' => "required|max:50",
            'productDescription' => "required",
            'productImage'=> "required"
        ];
    }
}
