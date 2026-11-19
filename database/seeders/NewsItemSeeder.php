<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsItemSeeder extends Seeder
{
    public function run(): void
    {
        NewsItem::create([
            'title' => '3 Days to Go, NSC Students! The Countdown to a New Semester Begins!',
            'excerpt' => 'The excitement is building as we get ready to welcome a new semester! Prepare for another journey...',
            'category' => 'Announcement',
            'image_path' => 'images/news-featured.jpg',
            'is_featured' => true,
            'published_date' => '2026-11-12',
        ]);

        NewsItem::create([
            'title' => 'Local Industry Partners Promote Cybersecurity Awareness Among IT Students',
            'excerpt' => 'DICT and local partners conducted a seminar for IT students...',
            'category' => 'Community Updates',
            'image_path' => 'images/news-1.jpg',
            'is_featured' => false,
            'published_date' => '2026-11-03',
        ]);
    }
}
