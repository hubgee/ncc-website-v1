<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContentBlockRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    public function rules(): array
    {
        return [
            'payload.title' => ['nullable', 'string', 'max:255'],
            'payload.body' => ['nullable', 'string', 'max:5000'],
            'payload.value' => ['nullable', 'string', 'max:50'],
            'payload.label' => ['nullable', 'string', 'max:255'],
            'payload.icon' => ['nullable', 'string', 'max:100'],
            'payload.layout' => ['nullable', 'string', 'in:split,card'],
            'payload.link_url' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:5120', 'mimes:jpg,jpeg,png,webp'],
        ];
    }
}
