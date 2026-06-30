<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMediaRequest;
use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function store(StoreMediaRequest $request): JsonResponse|RedirectResponse
    {
        $directory = $request->input('directory', 'uploads');
        $media = Media::fromUpload($request->file('file'), $directory, auth()->id());

        if ($request->input('alt_text')) {
            $media->update(['alt_text' => $request->input('alt_text')]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'id' => $media->id,
                'url' => $media->url,
            ]);
        }

        return back()->with('success', 'File uploaded successfully.');
    }

    public function destroy(Media $media): RedirectResponse
    {
        if ($media->disk === 'public' && Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }

        $media->delete();

        return back()->with('success', 'Media deleted.');
    }
}
