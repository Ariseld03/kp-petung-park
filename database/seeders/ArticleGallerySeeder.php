<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleGallerySeeder extends Seeder
{
    public function run()
    {
        // Retrieve IDs from the articles and galleries tables
        $articleIds = DB::table('articles')->pluck('id');
        $galleryIds = DB::table('galleries')->pluck('id');

        // Check if there are any articles and galleries to seed
        if ($articleIds->isEmpty() || $galleryIds->isEmpty()) {
            $this->command->info('No articles or galleries found. Please seed the articles and galleries tables first.');
            return;
        }

        // Insert records into the article_gallery table
        DB::table('article_gallery')->insert([
            [
                'article_id' => $articleIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 1',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => $articleIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 2',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => $articleIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 3',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more entries as needed, ensuring unique combinations
        ]);
    }
}
