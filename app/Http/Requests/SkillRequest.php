<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:100'],
            'level' => ['required', 'integer', 'min:0', 'max:100'],
            'category' => ['required', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:255'], // Bisa berupa class fontawesome/icon
        ];
    }
}
