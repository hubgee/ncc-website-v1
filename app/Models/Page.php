<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
        ];
    }

    public function contentBlocks(): HasMany
    {
        return $this->hasMany(ContentBlock::class)->orderBy('sort_order');
    }

    public function activeContentBlocks(): HasMany
    {
        return $this->contentBlocks()->where('is_active', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function blocksForSection(string $section)
    {
        return $this->activeContentBlocks()->where('section', $section)->get();
    }

    public function singletonBlock(string $section): ?ContentBlock
    {
        return $this->activeContentBlocks()
            ->where('section', $section)
            ->where('block_type', 'singleton')
            ->first();
    }
}
