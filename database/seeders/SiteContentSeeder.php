<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'section' => 'home',
                'type' => 'hero',
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'image_path' => null,
                'accent_color' => 'red',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 0,
                'is_published' => true,
            ],
            [
                'section' => 'home',
                'type' => 'update',
                'title' => 'TAKE ON TYPHOID',
                'subtitle' => null,
                'description' => 'Typhoid vaccine being administered to children below 15',
                'image_path' => null,
                'accent_color' => 'red',
                'button_text' => 'Read More',
                'button_url' => '#',
                'sort_order' => 0,
                'is_published' => true,
            ],
            [
                'section' => 'home',
                'type' => 'update',
                'title' => 'CHILDREN IN TECH',
                'subtitle' => null,
                'description' => 'Children in Tech highlights the growing involvement of young people in the digital world, where technology is shaping education, creativity, and future opportunities. An initiative sponsored by UNICEF and the Malawi government.',
                'image_path' => null,
                'accent_color' => 'red',
                'button_text' => 'Read More',
                'button_url' => '#',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'section' => 'home',
                'type' => 'news',
                'title' => 'May 2025 – Parliament Passes Strengthened Child Protection Act',
                'subtitle' => null,
                'description' => null,
                'image_path' => null,
                'accent_color' => 'red',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 0,
                'is_published' => true,
            ],
            [
                'section' => 'home',
                'type' => 'news',
                'title' => 'May 2025 – National Day of the African Child – Celebrations & Pledges',
                'subtitle' => null,
                'description' => null,
                'image_path' => null,
                'accent_color' => 'red',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'section' => 'home',
                'type' => 'news',
                'title' => 'May 2025 – National Day of the African Child – Celebrations & Pledges',
                'subtitle' => null,
                'description' => null,
                'image_path' => null,
                'accent_color' => 'red',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 2,
                'is_published' => true,
            ],
        ];

        foreach ($rows as $row) {
            SiteContent::create($row);
        }
    }
}
