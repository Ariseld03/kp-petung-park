<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class GalleriesShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleryIds = DB::table('galleries')->pluck('id');

        // Ensure we have at least one gallery to reference
        if ($galleryIds->isEmpty()) {
            $this->command->info('No galleries found. Please seed the galleries table first.');
            return;
        }

        // Insert multiple records into the galleries_show table
        DB::table('galleries_show')->insert([
            [
                'name' => 'Show 1',
                'status' => 1,
                'gallery_id' => $galleryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Show 2',
                'status' => 1,
                'gallery_id' => $galleryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Show 3',
                'status' => 0,
                'gallery_id' => $galleryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Show 4',
                'status' => 1,
                'gallery_id' => $galleryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Show 5',
                'status' => 0,
                'gallery_id' => $galleryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
