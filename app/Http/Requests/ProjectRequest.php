<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $projectId = $this->route('project') ? $this->route('project')->id : null;

        return [
            'category_id' => ['required', 'exists:project_categories,id'],
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['required', 'string', 'max:220', 'unique:projects,slug,' . $projectId],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'], // Nullable saat update
            'github_url' => ['nullable', 'url', 'max:255'],
            'live_demo' => ['nullable', 'url', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'role' => ['required', 'string', 'max:100'],
            'status' => ['required', 'in:Completed,Development,Archived'],
            'featured' => ['boolean'],
            'technologies' => ['nullable', 'array'],
            'technologies.*' => ['exists:technologies,id'],
        ];
    }
}
