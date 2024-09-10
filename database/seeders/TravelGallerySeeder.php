<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TravelGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve a list of existing travel IDs
        $travelIds = DB::table('travels')->pluck('id');
        
        // Retrieve a list of existing gallery IDs
        $galleryIds = DB::table('galleries')->pluck('id');

        // Ensure we have at least one travel and one gallery to reference
        if ($travelIds->isEmpty() || $galleryIds->isEmpty()) {
            $this->command->info('No travels or galleries found. Please seed the related tables first.');
            return;
        }

        // Insert multiple records into the travel_gallery table
        DB::table('travel_gallery')->insert([
            [
                'travel_id' => $travelIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 1',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'travel_id' => $travelIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 2',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'travel_id' => $travelIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 3',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'travel_id' => $travelIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 4',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'travel_id' => $travelIds->random(),
                'gallery_id' => $galleryIds->random(),
                'name_collage' => 'Collage 5',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
