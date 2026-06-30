<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->is_admin ?? false;
    }

    public function rules(): array
    {
        return [
            'hero.headline' => ['nullable', 'string', 'max:255'],
            'hero.subheadline' => ['nullable', 'string', 'max:500'],
            'hero.background' => ['nullable', 'image', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
            'hero.background_media_id' => ['nullable', 'integer', 'exists:media,id'],
            'hero.primary_cta.text' => ['nullable', 'string', 'max:100'],
            'hero.primary_cta.route' => ['nullable', 'string', 'max:100'],
            'hero.secondary_cta.text' => ['nullable', 'string', 'max:100'],
            'hero.secondary_cta.route' => ['nullable', 'string', 'max:100'],

            'mission.title' => ['nullable', 'string', 'max:255'],
            'mission.subtitle' => ['nullable', 'string', 'max:255'],
            'mission.body' => ['nullable', 'string', 'max:5000'],

            'blocks' => ['nullable', 'array'],
            'blocks.*.title' => ['nullable', 'string', 'max:255'],
            'blocks.*.body' => ['nullable', 'string', 'max:5000'],
            'blocks.*.value' => ['nullable', 'string', 'max:50'],
            'blocks.*.label' => ['nullable', 'string', 'max:255'],
            'blocks.*.icon' => ['nullable', 'string', 'max:100'],
            'blocks.*.layout' => ['nullable', 'string', 'in:split,card'],
            'blocks.*.link_url' => ['nullable', 'string', 'max:500'],
            'blocks.*.media_id' => ['nullable', 'integer', 'exists:media,id'],

            'block_images.*' => ['nullable', 'image', 'max:5120', 'mimes:jpg,jpeg,png,webp'],
        ];
    }
}
