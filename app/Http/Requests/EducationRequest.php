<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            'institution' => ['required', 'string', 'max:200'],
            'degree' => ['required', 'string', 'max:100'],
            'major' => ['required', 'string', 'max:150'],
            'gpa' => ['nullable', 'numeric', 'min:0', 'max:4.00'],
            'start_year' => ['required', 'digits:4', 'integer', 'min:1950', 'max:' . (date('Y') + 1)],
            'end_year' => ['nullable', 'digits:4', 'integer', 'gte:start_year'],
            'description' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:1024'],
        ];
    }
}
