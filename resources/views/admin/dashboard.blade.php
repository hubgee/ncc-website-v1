@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-2">Content Management</h1>
            <p class="text-gray-600 mb-6">Manage website pages, images, and text content.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($pages as $page)
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-green-500 transition">
                        <h2 class="text-lg font-semibold text-gray-900">{{ $page->title }}</h2>
                        <p class="text-sm text-gray-500 mb-4">/{{ $page->slug === 'home' ? '' : $page->slug }}</p>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.pages.edit', $page) }}"
                               class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700">
                                Edit Content
                            </a>
                            @if ($page->slug === 'home')
                                <a href="{{ route('home') }}" target="_blank"
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md hover:bg-gray-50">
                                    View Page
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('home') }}" class="text-green-700 hover:text-green-900 text-sm">← Back to website</a>
            </div>
        </div>
    </div>
@endsection
