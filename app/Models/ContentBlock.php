<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContentBlock extends Model
{
    protected $fillable = [
        'page_id',
        'section',
        'block_type',
        'payload',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'payload' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function getPayloadValue(string $key, mixed $default = null): mixed
    {
        return data_get($this->payload, $key, $default);
    }

    public function imageUrl(): ?string
    {
        $mediaId = $this->getPayloadValue('media_id')
            ?? $this->getPayloadValue('background_media_id');

        if (! $mediaId) {
            return null;
        }

        return Media::find($mediaId)?->url;
    }
}
