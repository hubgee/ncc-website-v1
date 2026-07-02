<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => SiteContent::count(),
            'published' => SiteContent::where('is_published', true)->count(),
            'sections' => SiteContent::select('section')->distinct()->count(),
        ];

        $recent = SiteContent::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent'));
    }
}
