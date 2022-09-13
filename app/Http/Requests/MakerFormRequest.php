<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MakerFormRequest extends FormRequest
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
            'makerImage' => [
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'makerName' => [
                'required',
                'max:50',
            ],
            'makerCode'  => [
                'required',
                Rule::unique('makers')->ignore($this->id),
                'regex:/\b[A-Z0-9]{4,15}\b/'
            ],
        ];
    }
}
