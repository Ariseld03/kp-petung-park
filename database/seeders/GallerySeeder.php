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
        $makanan = '/images/galeri/makanan/';
        $pemandangan = '/images/galeri/pemandangan/';

        DB::table('galleries')->insert([
            [
                'name' => 'Selamat Datang di Petung Park',
                'photo_link' => '/images/beranda/slideshow/petungpark.jpg',
                'description' => "Petung Park berada di Desa Belik, kata 'Belik' memiliki arti mata air kecil",
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo Kecek Air',
                'photo_link' => $pemandangan.'gazeboKecek.JPG',
                'description' => "Terdapat air di bawah gazebo yang dapat bermain air atau berkecek ria",
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Acara Pelatihan Prima',
                'photo_link' => '/images/galeri/pemandangan/pelatihanPrima.png',
                'description' => "Pelatihan Pelayanan Prima diselenggarakan oleh Ubaya",
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo Lesehan',
                'photo_link' => $pemandangan.'gazeboKecek.JPG',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pemandangan Sawah',
                'photo_link' => $pemandangan.'jalanHutanBambu.JPG',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo',
                'photo_link' => $pemandangan.'gazeboKecek.JPG',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumber Air',
                'photo_link' => $pemandangan.'sumberMataAir.JPG',
                'description' => 'Sumber air langsung dari hutan bambu',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hutan Bambu',
                'photo_link' => $pemandangan.'pohonBambu.JPG',
                'description' => 'Hutan Bambu yang asri dan sejuk',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Bayi',
                'photo_link' => $pemandangan.'kolomBayi.JPG',
                'description' => 'Kolom Bayi yang bisa digunakan untuk bermain air untuk anak-anak',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera',
                'photo_link' => $pemandangan,'pujaseraTampakLuar.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayam Goreng',
                'photo_link' => 'https://img-global.cpcdn.com/recipes/ff70ae9c035a4aba/400x400cq70/photo.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bebek Goreng Ngos',
                'photo_link' => 'https://assets.promediateknologi.id/crop/0x0:0x0/750x0/webp/photo/2022/12/01/2425343811.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Hemat Makanan 5-6 Orang',
                'photo_link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHRlBVvbVKqs1sADQmwlQzmwUuStumNY87sg&s',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasi Goreng',
                'photo_link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHZLsgm7xh-9q3KhCtP3fUfcRqvvFCkYjM8w&s',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Manis',
                'photo_link' => 'https://assets.kbeonline.id/main/2023/10/photo-21.jpeg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kentang Goreng',
                'photo_link' => 'https://egafood.co.id/wp-content/uploads/2023/08/kentang-goreng.jpg.webp',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Krim Stroberi',
                'photo_link' => 'https://pidjar.com/wp-content/uploads/2021/06/stroberi.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayam Geprek',
                'photo_link' => 'https://www.dapurkobe.co.id/wp-content/uploads/kulit-ayam-crispy-geprek.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
