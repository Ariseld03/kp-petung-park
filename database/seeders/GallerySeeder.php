<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $slideshow = '/images/beranda/slideshow/';
        $pemandangan = '/images/galeri/pemandangan/petung/';
        $makanan = '/images/galeri/makanan';
        DB::table('galleries')->insert([
            [
                'name' => 'Selamat Datang di Petung Park',
                'photo_link' => $slideshow . '/petungpark.jpg',
                'description' => "Petung Park berada di Desa Belik, kata 'Belik' memiliki arti mata air kecil",
                'status' => 1,
                'number_love' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
