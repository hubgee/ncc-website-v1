@extends('layouts.admin')

@section('title', 'Edit ' . $page->title)

@php
    $hero = ($blocks->get('hero') ?? collect())->first();
    $mission = ($blocks->get('mission') ?? collect())->first();
    $heroPayload = $hero?->payload ?? [];
    $missionPayload = $mission?->payload ?? [];
    $heroMedia = isset($heroPayload['background_media_id']) ? \App\Models\Media::find($heroPayload['background_media_id']) : null;
@endphp

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.dashboard') }}" class="text-green-700 hover:text-green-900 text-sm">← Back to dashboard</a>
        <h1 class="text-2xl font-bold text-gray-900 mt-2">Edit: {{ $page->title }}</h1>
    </div>

    <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        @if (in_array('hero', $sections))
            <section class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Hero Section</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Headline</label>
                        <input type="text" name="hero[headline]" value="{{ old('hero.headline', $heroPayload['headline'] ?? '') }}"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subheadline</label>
                        <input type="text" name="hero[subheadline]" value="{{ old('hero.subheadline', $heroPayload['subheadline'] ?? '') }}"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Background Image</label>
                        @if ($heroMedia)
                            <img src="{{ $heroMedia->url }}" alt="Current hero" class="h-24 w-auto mb-2 rounded">
                        @endif
                        <input type="file" name="hero[background]" accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-50 file:text-green-700">
                        <input type="hidden" name="hero[background_media_id]" value="{{ $heroPayload['background_media_id'] ?? '' }}">
                    </div>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Primary CTA Text</label>
                            <input type="text" name="hero[primary_cta][text]"
                                   value="{{ old('hero.primary_cta.text', $heroPayload['primary_cta']['text'] ?? '') }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Primary CTA Route</label>
                            <input type="text" name="hero[primary_cta][route]"
                                   value="{{ old('hero.primary_cta.route', $heroPayload['primary_cta']['route'] ?? '') }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm" placeholder="reporting">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Secondary CTA Text</label>
                            <input type="text" name="hero[secondary_cta][text]"
                                   value="{{ old('hero.secondary_cta.text', $heroPayload['secondary_cta']['text'] ?? '') }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Secondary CTA Route</label>
                            <input type="text" name="hero[secondary_cta][route]"
                                   value="{{ old('hero.secondary_cta.route', $heroPayload['secondary_cta']['route'] ?? '') }}"
                                   class="w-full rounded-md border-gray-300 shadow-sm" placeholder="what-we-do">
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if (in_array('mission', $sections))
            <section class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Mission Section</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="mission[title]" value="{{ old('mission.title', $missionPayload['title'] ?? '') }}"
                               class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subtitle</label>
                        <input type="text" name="mission[subtitle]" value="{{ old('mission.subtitle', $missionPayload['subtitle'] ?? '') }}"
                               class="w-full rounded-md border-gray-300 shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                        <textarea name="mission[body]" rows="4"
                                  class="w-full rounded-md border-gray-300 shadow-sm">{{ old('mission.body', $missionPayload['body'] ?? '') }}</textarea>
                    </div>
                </div>
            </section>
        @endif

        @foreach (['mission_features' => 'Mission Features', 'statistics' => 'Statistics', 'featured_updates' => 'Featured Updates', 'news' => 'News Articles'] as $sectionKey => $sectionLabel)
            @if (in_array($sectionKey, $sections))
                <section class="bg-white shadow-sm rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ $sectionLabel }}</h2>
                    <div class="space-y-4">
                        @forelse ($blocks->get($sectionKey) ?? [] as $block)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <input type="hidden" name="blocks[{{ $block->id }}][media_id]" value="{{ $block->payload['media_id'] ?? '' }}">

                                @if ($sectionKey === 'mission_features')
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Icon class</label>
                                            <input type="text" name="blocks[{{ $block->id }}][icon]"
                                                   value="{{ $block->payload['icon'] ?? '' }}"
                                                   class="w-full rounded-md border-gray-300 shadow-sm" placeholder="fa-shield-halved">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Label</label>
                                            <input type="text" name="blocks[{{ $block->id }}][label]"
                                                   value="{{ $block->payload['label'] ?? '' }}"
                                                   class="w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                    </div>
                                @elseif ($sectionKey === 'statistics')
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Value</label>
                                            <input type="text" name="blocks[{{ $block->id }}][value]"
                                                   value="{{ $block->payload['value'] ?? '' }}"
                                                   class="w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Label</label>
                                            <input type="text" name="blocks[{{ $block->id }}][label]"
                                                   value="{{ $block->payload['label'] ?? '' }}"
                                                   class="w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                    </div>
                                @else
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                                            <input type="text" name="blocks[{{ $block->id }}][title]"
                                                   value="{{ $block->payload['title'] ?? '' }}"
                                                   class="w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                        @if ($sectionKey === 'featured_updates')
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                                                <textarea name="blocks[{{ $block->id }}][body]" rows="3"
                                                          class="w-full rounded-md border-gray-300 shadow-sm">{{ $block->payload['body'] ?? '' }}</textarea>
                                            </div>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Icon (optional)</label>
                                                    <input type="text" name="blocks[{{ $block->id }}][icon]"
                                                           value="{{ $block->payload['icon'] ?? '' }}"
                                                           class="w-full rounded-md border-gray-300 shadow-sm">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Layout</label>
                                                    <select name="blocks[{{ $block->id }}][layout]" class="w-full rounded-md border-gray-300 shadow-sm">
                                                        <option value="split" @selected(($block->payload['layout'] ?? '') === 'split')>Split</option>
                                                        <option value="card" @selected(($block->payload['layout'] ?? '') === 'card')>Card</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                                            @if (!empty($block->payload['media_id']))
                                                @php $blockMedia = \App\Models\Media::find($block->payload['media_id']); @endphp
                                                @if ($blockMedia)
                                                    <img src="{{ $blockMedia->url }}" alt="" class="h-20 w-auto mb-2 rounded">
                                                @endif
                                            @endif
                                            <input type="file" name="block_images[{{ $block->id }}]" accept="image/*"
                                                   class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-green-50 file:text-green-700">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Link URL (optional)</label>
                                            <input type="text" name="blocks[{{ $block->id }}][link_url]"
                                                   value="{{ $block->payload['link_url'] ?? '' }}"
                                                   class="w-full rounded-md border-gray-300 shadow-sm">
                                        </div>
                                    </div>
                                @endif

                                <p class="mt-3 text-sm text-gray-500">Block #{{ $block->id }} — use delete below after saving if needed.</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No blocks in this section yet.</p>
                        @endforelse
                    </div>
                </section>
            @endif
        @endforeach

        <div class="flex justify-end">
            <button type="submit"
                    class="inline-flex items-center px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700">
                Save Changes
            </button>
        </div>
    </form>

    @foreach (['mission_features' => 'feature', 'statistics' => 'stat', 'featured_updates' => 'card', 'news' => 'card'] as $sectionKey => $blockType)
        @if (in_array($sectionKey, $sections))
            <div class="mt-4 flex flex-wrap items-center gap-4">
                <form method="POST" action="{{ route('admin.blocks.store', $page) }}">
                    @csrf
                    <input type="hidden" name="section" value="{{ $sectionKey }}">
                    <input type="hidden" name="block_type" value="{{ $blockType }}">
                    <button type="submit" class="text-sm text-green-700 hover:text-green-900 font-medium">
                        + Add to {{ str_replace('_', ' ', $sectionKey) }}
                    </button>
                </form>
            </div>
        @endif
    @endforeach

    @foreach ($blocks->flatten() as $block)
        <form method="POST" action="{{ route('admin.blocks.destroy', $block) }}" class="inline"
              onsubmit="return confirm('Delete block #{{ $block->id }}?')">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    @if ($blocks->flatten()->isNotEmpty())
        <section class="bg-white shadow-sm rounded-lg p-6 mt-8">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Delete Blocks</h2>
            <div class="flex flex-wrap gap-2">
                @foreach ($blocks->flatten() as $block)
                    <form method="POST" action="{{ route('admin.blocks.destroy', $block) }}"
                          onsubmit="return confirm('Delete block #{{ $block->id }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm px-3 py-1 border border-red-300 text-red-700 rounded hover:bg-red-50">
                            Delete #{{ $block->id }} ({{ $block->section }})
                        </button>
                    </form>
                @endforeach
            </div>
        </section>
    @endif
@endsection
