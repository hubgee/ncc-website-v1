<?php

namespace Database\Seeders;

use App\Models\ContentBlock;
use App\Models\Media;
use App\Models\Page;
use Illuminate\Database\Seeder;

class HomePageSeeder extends Seeder
{
    public function run(): void
    {
        $page = Page::updateOrCreate(
            ['slug' => 'home'],
            ['title' => 'Home', 'is_published' => true]
        );

        $heroBg = Media::fromStaticAsset('images/hero-children.jpg', 'hero-children.jpg', 'Hero background');
        $vaccine = Media::fromStaticAsset('images/vaccine.jpg', 'vaccine.jpg', 'Take on Typhoid');
        $kidsCoding = Media::fromStaticAsset('images/Kids-Coding.jpg', 'Kids-Coding.jpg', 'Children in Tech');
        $update1 = Media::fromStaticAsset('images/update-1.jpg', 'update-1.jpg', 'Child protection act');
        $update2 = Media::fromStaticAsset('images/update-2.jpg', 'update-2.jpg', 'National day of the African child');

        ContentBlock::updateOrCreate(
            ['page_id' => $page->id, 'section' => 'hero', 'block_type' => 'singleton'],
            [
                'payload' => [
                    'headline' => 'Every Child Matters, Every Voice Counts',
                    'subheadline' => 'Safeguarding children\'s rights and dignity.',
                    'background_media_id' => $heroBg->id,
                    'primary_cta' => ['text' => 'Report a Case Now', 'route' => 'reporting'],
                    'secondary_cta' => ['text' => 'Work With Us', 'route' => 'what-we-do'],
                ],
                'sort_order' => 0,
            ]
        );

        ContentBlock::updateOrCreate(
            ['page_id' => $page->id, 'section' => 'mission', 'block_type' => 'singleton'],
            [
                'payload' => [
                    'title' => 'Our Mission',
                    'subtitle' => 'Championing the Rights of Children in Malawi',
                    'body' => 'The National Children\'s Commission works tirelessly to protect, promote, and fulfill the rights of children. We believe every child regardless of background deserves safety, education and the chance to thrive.',
                ],
                'sort_order' => 0,
            ]
        );

        $features = [
            ['icon' => 'fa-shield-halved', 'label' => 'Protection First'],
            ['icon' => 'fa-graduation-cap', 'label' => 'Education & Awareness'],
            ['icon' => 'fa-scale-balanced', 'label' => 'Justice & Advocacy'],
        ];

        foreach ($features as $i => $feature) {
            ContentBlock::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'section' => 'mission_features',
                    'block_type' => 'feature',
                    'sort_order' => $i,
                ],
                ['payload' => $feature]
            );
        }

        $stats = [
            ['value' => '1,249+', 'label' => 'Children Supported'],
            ['value' => '2,000+', 'label' => 'Families Reached'],
            ['value' => '6,000+', 'label' => 'Community Members'],
            ['value' => '28', 'label' => 'Districts Covered'],
        ];

        foreach ($stats as $i => $stat) {
            ContentBlock::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'section' => 'statistics',
                    'block_type' => 'stat',
                    'sort_order' => $i,
                ],
                ['payload' => $stat]
            );
        }

        ContentBlock::updateOrCreate(
            [
                'page_id' => $page->id,
                'section' => 'featured_updates',
                'block_type' => 'card',
                'sort_order' => 0,
            ],
            [
                'payload' => [
                    'title' => 'TAKE ON TYPHOID',
                    'body' => 'Typhoid vaccine being administered to children below 15',
                    'media_id' => $vaccine->id,
                    'icon' => 'fa-kit-medical',
                    'layout' => 'split',
                    'link_url' => null,
                ],
            ]
        );

        ContentBlock::updateOrCreate(
            [
                'page_id' => $page->id,
                'section' => 'featured_updates',
                'block_type' => 'card',
                'sort_order' => 1,
            ],
            [
                'payload' => [
                    'title' => 'CHILDREN IN TECH',
                    'body' => 'Children in Tech highlights the growing involvement of young people in the digital world, where technology is shaping education, creativity, and future opportunities. An initiative sponsored by UNICEF and the Malawi government.',
                    'media_id' => $kidsCoding->id,
                    'icon' => null,
                    'layout' => 'card',
                    'link_url' => null,
                ],
            ]
        );

        $newsItems = [
            [
                'title' => 'May 2025 – Parliament Passes Strengthened Child Protection Act',
                'media_id' => $update1->id,
            ],
            [
                'title' => 'May 2025 – National Day of the African Child – Celebrations & Pledges',
                'media_id' => $update2->id,
            ],
            [
                'title' => 'May 2025 – National Day of the African Child – Celebrations & Pledges',
                'media_id' => $update2->id,
            ],
        ];

        foreach ($newsItems as $i => $item) {
            ContentBlock::updateOrCreate(
                [
                    'page_id' => $page->id,
                    'section' => 'news',
                    'block_type' => 'card',
                    'sort_order' => $i,
                ],
                [
                    'payload' => array_merge($item, ['link_url' => null]),
                ]
            );
        }
    }
}
