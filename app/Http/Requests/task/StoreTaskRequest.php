<?php

namespace App\Http\Requests\task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Override;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_id'=>
            [
                'required',
                'integer',
                Rule::exists('projects', 'id')],
            'team_id'=>
            [
                'required',
                'integer', Rule::exists('teams', 'id')
            ],
            'reviewer_id'=>
            [
                'nullable',
                'integer', Rule::exists('users', 'id')
            ],
                'title'=>
            [
                'required',
                'string',
                'max:255'
            ],
            'description'=>
            [
                'nullable',
                'string'
            ],
            'status'=>
            [
                'sometimes',
                Rule::in(['todo', 'in_progress', 'in_review', 'completed'])
            ],
            'priority'=>
            [
                'sometimes',
                Rule::in(['high', 'medium', 'low'])
            ],
            'progress'=>
            [
                'sometimes',
                'integer',
                'between:0,100'
            ],
            'due_date'=>
            [
                'nullable',
                'date',
                'after_or_equal:today'
            ],
            'created_by'=>
            [
                'required',
                'integer'
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
 #[Override]
 public function prepareForValidation():void
 {
    $this->merge(["created_by"=>$this->user()->id]);
 }
}
