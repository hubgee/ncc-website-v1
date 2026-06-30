<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContentBlockRequest;
use App\Http\Requests\Admin\UpdateContentBlockRequest;
use App\Models\ContentBlock;
use App\Models\Media;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;

class ContentBlockController extends Controller
{
    public function store(StoreContentBlockRequest $request, Page $page): RedirectResponse
    {
        $validated = $request->validated();
        $payload = $validated['payload'] ?? [];

        if (empty($payload)) {
            $payload = match ($validated['block_type']) {
                'feature' => ['icon' => 'fa-circle', 'label' => 'New Feature'],
                'stat' => ['value' => '0', 'label' => 'New Statistic'],
                'card' => ['title' => 'New Item', 'body' => '', 'layout' => 'card', 'link_url' => null],
                default => [],
            };
        }

        if ($request->hasFile('image')) {
            $media = Media::fromUpload($request->file('image'), "uploads/{$page->slug}", auth()->id());
            $payload['media_id'] = $media->id;
        }

        $maxOrder = $page->contentBlocks()
            ->where('section', $validated['section'])
            ->max('sort_order') ?? -1;

        ContentBlock::create([
            'page_id' => $page->id,
            'section' => $validated['section'],
            'block_type' => $validated['block_type'],
            'payload' => $payload,
            'sort_order' => $maxOrder + 1,
        ]);

        return back()->with('success', 'Content block added.');
    }

    public function update(UpdateContentBlockRequest $request, ContentBlock $block): RedirectResponse
    {
        $payload = array_merge($block->payload ?? [], $request->validated('payload', []));

        if ($request->hasFile('image')) {
            $media = Media::fromUpload(
                $request->file('image'),
                "uploads/{$block->page->slug}",
                auth()->id()
            );
            $payload['media_id'] = $media->id;
        }

        $block->update(['payload' => $payload]);

        return back()->with('success', 'Content block updated.');
    }

    public function destroy(ContentBlock $block): RedirectResponse
    {
        $block->delete();

        return back()->with('success', 'Content block removed.');
    }
}
