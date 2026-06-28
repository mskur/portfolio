<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:200'],
            'issuer' => ['required', 'string', 'max:150'],
            'issue_date' => ['required', 'date'],
            'expire_date' => ['nullable', 'date', 'after_or_equal:issue_date'],
            'credential_id' => ['nullable', 'string', 'max:150'],
            'credential_url' => ['nullable', 'url', 'max:255'],
            'image' => ['nullable', 'mimes:jpeg,png,jpg,pdf', 'max:2048'], // Mendukung PDF juga
        ];
    }
}
