<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVacancyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create_vacancy');
        // return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "max:60"],
            "description" => ["required", "string", "max:3000"],
            "about_worker" => ["string", "max:1000", "nullable"],
            "responsibilities" => ["string", "max:1000", "nullable"],
            "requirements" => ["string", "max:1000", "nullable"],
            "tags" => ["nullable"],
        ];
    }
}
