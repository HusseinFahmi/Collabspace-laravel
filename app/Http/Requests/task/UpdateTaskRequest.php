<?php

namespace App\Http\Requests\task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $task = $this->route("task");
        $userId= (int) $this->user()->id;
        if(!$task && !$userId) return false;
        return  (int) $task->created_by ===  $userId || $task->assignees()->wherekey($userId)->exists();
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reviewer_id'=>
            [
                'nullable',
                'integer', Rule::exists('users', 'id')
            ],
                'title'=>
            [
                'sometimes',
                'string',
                'max:255'
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
            'description'=>
            [
                'sometimes',
                'nullable',
                'string'
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
        ];
    }
}
