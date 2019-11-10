<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'productName' => "required|regex:/[a-zA-Z]/|min:3|max:50|",
            'productPrice' => "required|regex:/^[0-9]/|max:9|",
            'productOrigin' => "required|regex:/[a-zA-Z]/|max:50",
            'productDescription' => "required|regex:/[a-zA-Z]/|",
        ];
    }
}
