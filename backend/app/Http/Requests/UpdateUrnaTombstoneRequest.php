<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUrnaTombstoneRequest extends FormRequest
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
            "tombstone_id" => ["required", "string", "max:10"],
            "name" => ["required", "string", "max:50"],
            "description" => ["required", "string"],
            "image" => ["nullable", "file", "image", "max:2048"], // ide jön a feltöltött fájl
            "group" => ["nullable", "string", "max:50"],
        ];
    }
}
