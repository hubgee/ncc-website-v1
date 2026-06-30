<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $pages = Page::orderBy('title')->get();

        return view('admin.dashboard', compact('pages'));
    }
}
