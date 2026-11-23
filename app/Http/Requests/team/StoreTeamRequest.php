<?php

namespace App\Http\Requests\team;

use App\Models\Project;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $project = Project::find($this->input('project_id'));
        return $project && (int) $project->created_by === (int) $this->user()?->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "project_id"=>
            [
                "required",
                "integer",
                Rule::exists("projects","id"),
            ],
            "name"=>
            [
                "string",
                "required",
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
