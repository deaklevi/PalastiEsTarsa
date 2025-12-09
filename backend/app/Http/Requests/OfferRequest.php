<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'cemetery' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:50',
            'material' => 'nullable|string|max:100',
            'base_code' => 'nullable|string|max:50',
            'head_code' => 'nullable|string|max:50',
            'extras' => 'nullable|string|max:255',
            'inscription_type' => 'nullable|string|max:100',
            'inscription' => 'nullable|string|max:1000',
            'message' => 'nullable|string|max:2000',
        ];
    }
}
