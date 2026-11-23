<?php

namespace App\Http\Requests\project;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreProjectRequest extends FormRequest
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
            "project_name"=>
            [
                "string",
                "max:255",
                "required",
            ],
            "description"=>
            [
                "string",
                "nullable"
            ],
            "start_date"=>
            [
                "date",
                "required",
            ],
            "deadline"=>
            [
                "date",
                "nullable",
                "after_or_equal:start_date"
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
                "required",
                "string",
                "max:100"
            ],
            "files"=>
            [
                "sometimes",
                "array",
                "mimes:pdf,doc,docx,png,jpg,jpeg,zip",
            ],
            "files.*"=>
            [
                "file",
                "max:10240",

            ],
            "created_by"=>
            [
                "required",
                "integer",
                Rule::exists("users","id")
            ]
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            "created_by"=>$this->user()->id
        ]);
    }


}
