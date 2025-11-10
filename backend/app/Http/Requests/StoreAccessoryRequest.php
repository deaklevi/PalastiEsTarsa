<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccessoryRequest extends FormRequest
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
            "order" => ["required", "integer", "max:500"],
            "accessory_id" => ["nullable", "string", "max:10"],
            "name" => ["required", "string", "max:50"],
            "type" => ["required", "string"],
            "size" => ["required", "string"],
            "recommended_type" => ["required", "string"],
            "manufacturing_technology" => ["required", "string"],
            "image" => ["nullable", "file", "image", "max:2048"], // ide jön a feltöltött fájl
            "group" => ["nullable", "string", "max:50"],
        ];
    }
}
