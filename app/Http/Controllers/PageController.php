<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $viewMap = [
            'about' => 'pages.about',
            'what-we-do' => 'pages.what-we-do',
            'childrens-corner' => 'pages.childrens-corner',
            'reporting' => 'pages.reporting',
        ];

        abort_unless(isset($viewMap[$slug]), 404);

        $page = Page::where('slug', $slug)->where('is_published', true)->first();

        return view($viewMap[$slug], [
            'page' => $page,
            'pageContent' => $page?->activeContentBlocks->groupBy('section') ?? collect(),
        ]);
    }
}