<?php

namespace App\Http\Requests\Tasks;

use App\Enums\TaskPriority;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $taskId = $this->route('task'); // Get task ID from URL

        return auth()->check() && Task::where('id', $taskId)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'priority' => ['required', Rule::in(TaskPriority::values())],
        ];
    }
}
