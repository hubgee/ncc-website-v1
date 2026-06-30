<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePageContentRequest;
use App\Models\ContentBlock;
use App\Models\Media;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageContentController extends Controller
{
    public function edit(Page $page): View
    {
        $sections = config("content_sections.{$page->slug}", []);
        $blocks = $page->contentBlocks()->orderBy('sort_order')->get()->groupBy('section');

        return view('admin.pages.edit', compact('page', 'sections', 'blocks'));
    }

    public function update(UpdatePageContentRequest $request, Page $page): RedirectResponse
    {
        $validated = $request->validated();

        if (isset($validated['hero'])) {
            $this->upsertSingleton($page, 'hero', $validated['hero'], $request);
        }

        if (isset($validated['mission'])) {
            $this->upsertSingleton($page, 'mission', $validated['mission']);
        }

        if (isset($validated['blocks'])) {
            foreach ($validated['blocks'] as $blockId => $payload) {
                $block = ContentBlock::where('page_id', $page->id)->findOrFail($blockId);
                $existing = $block->payload ?? [];

                if ($request->hasFile("block_images.{$blockId}")) {
                    $media = Media::fromUpload(
                        $request->file("block_images.{$blockId}"),
                        "uploads/{$page->slug}",
                        auth()->id()
                    );
                    $payload['media_id'] = $media->id;
                } else {
                    $payload['media_id'] = $payload['media_id'] ?? ($existing['media_id'] ?? null);
                }

                $block->update(['payload' => array_merge($existing, $payload)]);
            }
        }

        return redirect()
            ->route('admin.pages.edit', $page)
            ->with('success', 'Page content updated successfully.');
    }

    private function upsertSingleton(Page $page, string $section, array $data, ?UpdatePageContentRequest $request = null): void
    {
        $block = $page->contentBlocks()->where('section', $section)->where('block_type', 'singleton')->first();
        $payload = $block?->payload ?? [];

        if ($section === 'hero' && $request?->hasFile('hero.background')) {
            $media = Media::fromUpload(
                $request->file('hero.background'),
                "uploads/{$page->slug}",
                auth()->id()
            );
            $data['background_media_id'] = $media->id;
        } else {
            $data['background_media_id'] = $data['background_media_id'] ?? ($payload['background_media_id'] ?? null);
        }

        $merged = array_merge($payload, $data);

        if ($block) {
            $block->update(['payload' => $merged]);
        } else {
            ContentBlock::create([
                'page_id' => $page->id,
                'section' => $section,
                'block_type' => 'singleton',
                'payload' => $merged,
                'sort_order' => 0,
            ]);
        }
    }
}
