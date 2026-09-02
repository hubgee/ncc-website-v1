<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index($section)
    {
        $contents = SiteContent::where('section', $section)
            ->orderBy('sort_order')
            ->get();

        return view('admin.contents.index', compact('contents', 'section'));
    }

    public function store(Request $request, $section)
    {
        $validated = $request->validate([
            'type' => ['required', 'string', 'max:50'],
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'accent_color' => ['nullable', 'string', 'max:50', 'in:red,green,blue,yellow,purple,orange'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['boolean'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
            $validated['image_path'] = $path;
        }

        $validated['section'] = $section;
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        SiteContent::create($validated);

        return redirect()->route('admin.contents.index', ['section' => $section])->with('status', 'Content created successfully.');
    }

    public function edit($section, $id)
    {
        $content = SiteContent::where('section', $section)->findOrFail($id);

        return view('admin.contents.index', [
            'contents' => SiteContent::where('section', $section)->orderBy('sort_order')->get(),
            'section' => $section,
            'editing' => $content,
        ]);
    }

    public function update(Request $request, $section, $id)
    {
        $content = SiteContent::where('section', $section)->findOrFail($id);

        $validated = $request->validate([
            'type' => ['required', 'string', 'max:50'],
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'accent_color' => ['nullable', 'string', 'max:50', 'in:red,green,blue,yellow,purple,orange'],
            'button_text' => ['nullable', 'string', 'max:100'],
            'button_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_published' => ['boolean'],
            '_remove_image' => ['boolean'],
        ]);

        if ($request->boolean('_remove_image') && $content->image_path) {
            Storage::disk('public')->delete($content->image_path);
            $validated['image_path'] = null;
        } elseif ($request->hasFile('image')) {
            if ($content->image_path) {
                Storage::disk('public')->delete($content->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('uploads', 'public');
        }

        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        $content->update($validated);

        return redirect()->route('admin.contents.index', ['section' => $section])->with('status', 'Content updated successfully.');
    }

    public function togglePublish(Request $request, $section, $id)
    {
        $content = SiteContent::where('section', $section)->findOrFail($id);

        $content->is_published = ! $content->is_published;
        $content->published_at = $content->is_published ? now() : null;
        $content->save();

        return redirect()->route('admin.contents.index', ['section' => $section])
            ->with('status', 'Content '.($content->is_published ? 'published' : 'unpublished').' successfully.');
    }

    public function destroy(Request $request, $section, $id)
    {
        $content = SiteContent::where('section', $section)->findOrFail($id);

        if ($content->image_path) {
            Storage::disk('public')->delete($content->image_path);
        }

        $content->delete();

        return redirect()->route('admin.contents.index', ['section' => $section])->with('status', 'Content deleted successfully.');
    }

    public function uploadImage(Request $request, SiteContent $content)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($content->image_path) {
            Storage::disk('public')->delete($content->image_path);
        }

        $path = $request->file('image')->store('uploads', 'public');
        $content->update(['image_path' => $path]);

        return response()->json([
            'url' => asset('storage/'.$path),
        ]);
    }
}
