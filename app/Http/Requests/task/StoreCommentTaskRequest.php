<?php

namespace App\Http\Requests\task;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class StoreCommentTaskRequest extends FormRequest
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
            "comment"=>
            [
                "string",
                "required",
            ],
            "user_id"=>
            [
                "required",
                "integer"
            ],
            "task_id"=>
            [
                "required",
                "integer"
            ]


        ];
    }
    #[Override]
    public function prepareForValidation()
    {
        $task= $this->route("task");
        return
        [
            "task_id"=>$task->id,
            "user_id"=>$this->user()->id,
        ];
    }
}
