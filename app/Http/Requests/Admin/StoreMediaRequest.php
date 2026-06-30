<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'image', 'max:5120', 'mimes:jpg,jpeg,png,webp'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'directory' => ['nullable', 'string', 'max:255'],
        ];
    }
}
