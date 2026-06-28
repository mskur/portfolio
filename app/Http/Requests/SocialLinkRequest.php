<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SocialLinkRequest extends FormRequest
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
            'platform' => ['required', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:255'], // Menggunakan class font/icon atau path
            'url' => ['required', 'url', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ];
    }
}
