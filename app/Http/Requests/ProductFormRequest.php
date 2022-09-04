<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'productName' => 'required|min:3',
            'productCode'  => [
                'required',
                'min:4',
                Rule::unique('products')->ignore($this->id),
                'max:15',
                'regex:/[A-Z0-9]/'
            ],
        ];
    }
}
