<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['slug' => 'home', 'title' => 'Home'],
            ['slug' => 'about', 'title' => 'About Us'],
            ['slug' => 'what-we-do', 'title' => 'What We Do'],
            ['slug' => 'childrens-corner', 'title' => "Children's Corner"],
            ['slug' => 'reporting', 'title' => 'Reporting'],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(
                ['slug' => $page['slug']],
                ['title' => $page['title'], 'is_published' => true]
            );
        }
    }
}
