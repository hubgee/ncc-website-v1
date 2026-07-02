<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage {{ ucfirst($section) }} — Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('admin.dashboard') }}" class="text-green-700 font-bold hover:underline">Dashboard</a>
                <h1 class="text-xl font-bold text-gray-800">Manage: {{ ucfirst($section) }}</h1>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-700 font-semibold">Logout</button>
            </form>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @if (session('status'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded mb-6">
                <p class="font-semibold mb-1">Please fix the following errors:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1">
                <div class="bg-white shadow rounded-lg p-6">
                    <h2 class="text-lg font-bold text-gray-800 mb-4">
                        {{ $editing ?? null ? 'Edit Item' : 'Add New' }}
                    </h2>

                    @php
                        // Section-specific form behavior flags
                        $isHero = ($editing->type ?? null) === 'hero' || request()->query('type') === 'hero';
                        $isUpdate = ($editing->type ?? null) === 'update' || request()->query('type') === 'update';
                        $isNews = ($editing->type ?? null) === 'news' || request()->query('type') === 'news';
                    @endphp

                    <form method="POST"
                          action="{{ $editing ?? null ? route('admin.contents.update', ['section' => $section, 'id' => $editing->id]) : route('admin.contents.store', ['section' => $section]) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @if($editing ?? null)
                            @method('PUT')
                            <input type="hidden" name="section" value="{{ $section }}">
                            <input type="hidden" name="type" value="{{ $editing->type }}">
                        @else
                            <input type="hidden" name="section" value="{{ $section }}">
                        @endif

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Type</label>
                            @if($editing ?? null)
                                <input type="text" value="{{ ucfirst($editing->type) }}" disabled class="w-full border border-gray-200 rounded-md p-2 bg-gray-50 text-gray-600">
                            @else
                                <select name="type" class="w-full border border-gray-300 rounded-md p-2">
                                    <option value="hero" {{ (request()->old('type') ?? request()->query('type') ?? '') === 'hero' ? 'selected' : '' }}>Hero Background</option>
                                    <option value="update" {{ (request()->old('type') ?? request()->query('type') ?? '') === 'update' ? 'selected' : '' }}>Update Card</option>
                                    <option value="news" {{ (request()->old('type') ?? request()->query('type') ?? '') === 'news' ? 'selected' : '' }}>News Article</option>
                                </select>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Title</label>
                            <input type="text" name="title" value="{{ old('title', $editing->title ?? '') }}" class="w-full border border-gray-300 rounded-md p-2">
                            @error('title')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                            <textarea name="description" rows="3" class="w-full border border-gray-300 rounded-md p-2">{{ old('description', $editing->description ?? '') }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Image</label>
                            <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-md p-2">
                            @if($editing ?? null && $editing->image_path)
                                <img src="{{ asset('storage/' . $editing->image_path) }}" alt="" class="h-20 w-20 object-cover rounded mt-2">
                                <label class="flex items-center gap-2 mt-2 text-sm text-gray-600">
                                    <input type="checkbox" name="_remove_image" value="1" class="rounded">
                                    Remove current image
                                </label>
                            @endif
                            @error('image')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Accent Color</label>
                            <select name="accent_color" class="w-full border border-gray-300 rounded-md p-2">
                                <option value="red" {{ old('accent_color', $editing->accent_color ?? 'red') === 'red' ? 'selected' : '' }}>Red</option>
                                <option value="green" {{ old('accent_color', $editing->accent_color ?? 'red') === 'green' ? 'selected' : '' }}>Green</option>
                                <option value="blue" {{ old('accent_color', $editing->accent_color ?? 'red') === 'blue' ? 'selected' : '' }}>Blue</option>
                                <option value="yellow" {{ old('accent_color', $editing->accent_color ?? 'red') === 'yellow' ? 'selected' : '' }}>Yellow</option>
                                <option value="purple" {{ old('accent_color', $editing->accent_color ?? 'red') === 'purple' ? 'selected' : '' }}>Purple</option>
                                <option value="orange" {{ old('accent_color', $editing->accent_color ?? 'red') === 'orange' ? 'selected' : '' }}>Orange</option>
                            </select>
                            @error('accent_color')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Button Text</label>
                            <input type="text" name="button_text" value="{{ old('button_text', $editing->button_text ?? '') }}" class="w-full border border-gray-300 rounded-md p-2">
                            @error('button_text')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Button URL</label>
                            <input type="url" name="button_url" value="{{ old('button_url', $editing->button_url ?? '') }}" class="w-full border border-gray-300 rounded-md p-2">
                            @error('button_url')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $editing->sort_order ?? 0) }}" class="w-full border border-gray-300 rounded-md p-2">
                            @error('sort_order')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 flex items-center gap-2">
                            <input type="checkbox" name="is_published" id="is_published" {{ (old('is_published', $editing->is_published ?? true) ? 'checked' : '') }}>
                            <label for="is_published" class="text-sm font-semibold text-gray-700">Published</label>
                            @error('is_published')
                                <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="flex-1 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 font-semibold">
                                {{ $editing ?? null ? 'Update' : 'Create' }}
                            </button>
                            @if($editing ?? null)
                                <a href="{{ route('admin.contents.index', ['section' => $section]) }}" class="px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 font-semibold">Cancel</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Published</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($contents as $item)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900">{{ $item->title ?: '—' }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-600">{{ ucfirst($item->type) }}</td>
                                    <td class="px-4 py-3 text-sm">
                                        <span class="px-2 inline-flex text-xs font-semibold rounded-full {{ $item->is_published ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                            {{ $item->is_published ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-600">
                                        @if ($item->image_path)
                                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="" class="h-10 w-10 object-cover rounded">
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-right text-sm">
                                        <a href="{{ route('admin.contents.edit', ['section' => $section, 'id' => $item->id]) }}" class="text-green-600 hover:text-green-700 mr-3">Edit</a>
                                        <form method="POST" action="{{ route('admin.contents.toggle-publish', ['section' => $section, 'id' => $item->id]) }}" class="inline" onsubmit="return confirm('Toggle publish status?');">
                                            @csrf
                                            <button type="submit" class="text-blue-600 hover:text-blue-700 mr-3">
                                                {{ $item->is_published ? 'Unpublish' : 'Publish' }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.contents.destroy', ['section' => $section, 'id' => $item->id]) }}" class="inline" onsubmit="return confirm('Delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-6 text-center text-sm text-gray-500">No content yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
