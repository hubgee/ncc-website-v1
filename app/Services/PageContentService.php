<?php

namespace App\Services;

use App\Models\ContentBlock;
use App\Models\Media;
use App\Models\Page;
use Illuminate\Support\Collection;

class PageContentService
{
    public function loadPage(string $slug): Page
    {
        return Page::where('slug', $slug)
            ->where('is_published', true)
            ->with(['activeContentBlocks'])
            ->firstOrFail();
    }

    public function resolveHero(Page $page): array
    {
        $block = $page->singletonBlock('hero');
        $payload = $block?->payload ?? $this->defaultHero();

        return $this->resolveHeroPayload($payload);
    }

    public function resolveMission(Page $page): array
    {
        $block = $page->singletonBlock('mission');

        return $block?->payload ?? $this->defaultMission();
    }

    public function sectionBlocks(Page $page, string $section): Collection
    {
        return $page->blocksForSection($section);
    }

    public function resolveFeaturedUpdates(Collection $blocks): Collection
    {
        return $blocks->map(function (ContentBlock $block) {
            $block->setAttribute('image_url', $block->imageUrl());

            return $block;
        });
    }

    public function resolveNews(Collection $blocks): Collection
    {
        return $this->resolveFeaturedUpdates($blocks);
    }

    public function resolveHeroPayload(array $payload): array
    {
        $mediaId = $payload['background_media_id'] ?? null;
        $payload['background_url'] = $mediaId
            ? Media::find($mediaId)?->url
            : asset('images/hero-children.jpg');

        return $payload;
    }

    private function defaultHero(): array
    {
        return [
            'headline' => 'Every Child Matters, Every Voice Counts',
            'subheadline' => 'Safeguarding children\'s rights and dignity.',
            'background_media_id' => null,
            'background_url' => asset('images/hero-children.jpg'),
            'primary_cta' => ['text' => 'Report a Case Now', 'route' => 'reporting'],
            'secondary_cta' => ['text' => 'Work With Us', 'route' => 'what-we-do'],
        ];
    }

    private function defaultMission(): array
    {
        return [
            'title' => 'Our Mission',
            'subtitle' => 'Championing the Rights of Children in Malawi',
            'body' => 'The National Children\'s Commission works tirelessly to protect, promote, and fulfill the rights of children. We believe every child regardless of background deserves safety, education and the chance to thrive.',
        ];
    }
}
