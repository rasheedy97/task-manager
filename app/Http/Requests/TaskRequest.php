<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|max:50",
            "description" => "string|max:255",
            "due_date" => "date",
            "assignee_id" => "required|numeric|exists:users,id",
            "status_id" => "numeric|exists:statuses,id",
            "parent_id" => "numeric|exists:tasks,id"
        ];
    }
}