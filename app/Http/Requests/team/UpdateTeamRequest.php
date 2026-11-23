<?php

namespace App\Http\Requests\team;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $team = $this->route('team');
        return $team && (int) $team->project->created_by === (int) $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=>
            [
                "string",
                "sometimes",
                "max:255"
            ],
            "description"=>
            [
                "nullable",
                "string"
            ]
        ];
    }
}
