<?php

namespace App\Http\Requests\project;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Validation\Validator;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $project = $this->route("project");
        return $project !== null
            && (int) $project->created_by === (int) $this->user()?->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "project_name"=>
            [
                "string",
                "max:255",
                "sometimes",
            ],
            "description"=>
            [
                "string",
                "nullable"
            ],
            "start_date"=>
            [
                "date",
                "sometimes",
            ],
            "deadline"=>
            [
                "date",
                "nullable",
            ],
            'status'=>
            [
                'sometimes',
                Rule::in(['active', 'done', 'archived'])
            ],
            "priority"=>
            [
                "sometimes",
                Rule::in(['high', 'medium', 'low'])
            ],
            "project_type"=>
            [
                "sometimes",
                "string",
                "max:100"
            ],
        ];
    }
   public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($validator->errors()->isNotEmpty()) {
                    return;
                }
                $project   = $this->route("project");
                $startDate = $this->input('start_date', $project->start_date);
                $deadline  = $this->input('deadline', $project->deadline);
                if ($startDate && $deadline && Carbon::parse($deadline)->lt(Carbon::parse($startDate))) {
                    $validator->errors()->add('deadline', 'Deadline cannot be before start date.');
                }
            },
        ];
    }


}
