<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();
use App\Models\SiteContent;
use Illuminate\Contracts\Console\Kernel;

$hero = SiteContent::where('section', 'home')->where('type', 'hero')->first();
if ($hero) {
    echo "Before reset:\n";
    echo "  ID: {$hero->id}\n";
    echo '  Published: '.($hero->is_published ? 'yes' : 'no')."\n";
    echo '  Image: '.($hero->image_path ?? 'null')."\n";

    $hero->image_path = null;
    $hero->is_published = false;
    $hero->published_at = null;
    $hero->save();

    $hero2 = SiteContent::where('section', 'home')->where('type', 'hero')->first();
    echo "\nAfter reset:\n";
    echo '  Published: '.($hero2->is_published ? 'yes' : 'no')."\n";
    echo '  Image: '.($hero2->image_path ?? 'null')."\n";
    echo '  Published At: '.($hero2->published_at ?? 'null')."\n";
} else {
    echo "No hero record found\n";
}
