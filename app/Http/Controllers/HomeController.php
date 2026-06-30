<?php

namespace App\Http\Controllers;

use App\Services\PageContentService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private PageContentService $content) {}

    public function index(): View
    {
        $page = $this->content->loadPage('home');

        $featuredUpdates = $this->content->resolveFeaturedUpdates(
            $this->content->sectionBlocks($page, 'featured_updates')
        );

        $news = $this->content->resolveNews(
            $this->content->sectionBlocks($page, 'news')
        );

        return view('pages.home', [
            'hero' => $this->content->resolveHero($page),
            'mission' => $this->content->resolveMission($page),
            'features' => $this->content->sectionBlocks($page, 'mission_features'),
            'stats' => $this->content->sectionBlocks($page, 'statistics'),
            'featuredUpdates' => $featuredUpdates,
            'news' => $news,
        ]);
    }
}
