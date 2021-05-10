<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', auth()->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // if ($this->user()->hasRole("worker")) {
        return [
            "name" => ["required", "min:4", "string"],
            "worker_group" => ["string", "nullable"],
            "worker_cathedra" => ["string", "nullable"],
            "worker_faculty" => ["string", "nullable"],
            "worker_skills" => ["string", "nullable"],
            "about" => ["string", "max:600", "nullable"],
            "tags" => ["nullable"]
        ];
        // } else if ($this->user()->hasRole("customer")) {
        //     return [];
        // }
    }
}
