<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectLinkRequest extends FormRequest
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
            'type' => ['required', 'in:Github,Live Demo,YouTube,Documentation,Figma,APK'],
            'label' => ['required', 'string', 'max:100'],
            'url' => ['required', 'url', 'max:255'],
        ];
    }
}
