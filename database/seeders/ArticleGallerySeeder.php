<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleGallerySeeder extends Seeder
{
    public function run()
    {
        // Retrieve IDs from the articles and galleries tables
        $articleIds = DB::table('articles')->orderBy('id')->pluck('id');
        $galleryIds = DB::table('galleries')->orderBy('id')->pluck('id');

        // Check if there are any articles and galleries to seed
        if ($articleIds->isEmpty() || $galleryIds->isEmpty()) {
            $this->command->info('No articles or galleries found. Please seed the articles and galleries tables first.');
            return;
        }

        // Insert records into the article_gallery table
        DB::table('article_gallery')->insert([
            [
                'article_id' => $articleIds[3],
                'gallery_id' => $galleryIds[7],
                'name_collage' => 'Kolase Tracking',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => $articleIds[2],
                'gallery_id' => $galleryIds[6],
                'name_collage' => 'Kolase Wisata Hutan Bambu',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => $articleIds[4],
                'gallery_id' => $galleryIds[8],
                'name_collage' => 'Kolase Baby Pool',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => $articleIds[2],
                'gallery_id' => $galleryIds[7],
                'name_collage' => 'Kolase Ulang Tahun',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_id' => $articleIds[1],
                'gallery_id' => $galleryIds[19],
                'name_collage' => 'Kolase Pembukaan Kemah',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
