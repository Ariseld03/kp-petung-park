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
        $galleryIds = DB::table('galleries')->orderBy('id')->pluck('id');

        // Ensure we have at least one gallery to reference
        if ($galleryIds->isEmpty()) {
            $this->command->info('No galleries found. Please seed the galleries table first.');
            return;
        }

        // Insert multiple records into the galleries_show table
        DB::table('galleries_show')->insert([
            [
                'name' => 'Gazebo Kecek Air',
                'status' => 1,
                'gallery_id' => $galleryIds[1],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hidangan Camilan Ayam Geprek',
                'status' => 1,
                'gallery_id' => $galleryIds[17],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera ',
                'status' => 1,
                'gallery_id' => $galleryIds[9],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
