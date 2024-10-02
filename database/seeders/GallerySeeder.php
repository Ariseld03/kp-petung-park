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
                'photo_link' => 'https://static.promediateknologi.id/crop/22x100:984x814/0x0/webp/photo/p2/82/2023/11/08/oce-kelana-desa-3724991597.jpeg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Foto Selfie Gazebo Kecek Air',
                'photo_link' => 'https://awsimages.detik.net.id/community/media/visual/2023/10/19/petung-park-mojokerto_169.jpeg?w=600&q=90',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo Lesehan',
                'photo_link' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgC5u7fkuyR10xHmIhtlEWbel2KkqEjZpcGiFyCO-EeC2-twIPjJCE2kfO9y65rTmADo6Mmm1i1rbS0uUuM1kfwQQ_zVCF0w2-NbDfDpsA1LlvyTV51dnHc9n4yQlIrjSGwCMJvZsSj6If-dtzDxt1kfU8ZsMlzO5EC0Qn4-spJu9_XEFJ5HjakuFsHvQ/w640-h360/gubugan%20di%20petung%20park.heic',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pemandangan Sawah',
                'photo_link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRa7yqoWlQU2Nai7RyGvU7YMbbSP2cMemMYTw&s',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo',
                'photo_link' => 'https://thumb.viva.id/vivajatim/1265x711/2023/05/14/64602162bce11-wisata-petung-park-trawas-mojokerto_jatim.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumber Air',
                'photo_link' => 'https://img.okezone.com/okz/300/content/2024/07/04/408/3029768/danau_memukau_di_berau-4OGZ_large.JPG',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hutan Bambu',
                'photo_link' => 'https://www.surabayarollcake.com/wp-content/uploads/2018/11/Hutan-Bambu-Sukolilo.jpg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Bayi',
                'photo_link' => 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/575/2023/12/24/WhatsApp-Image-2023-12-24-at-223840-375120507.jpeg',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera',
                'photo_link' => 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiDNLwWig0dN_m_EUIcPGBPZXuqDrzcGBu4gkmj7b2JVWtV3pkhLp5ae5D9WKBdO8R4slZqiiYpD44FPyZL4Kfo9CaJjEpv7G0KzUaf1-ZUOTozTjZaFCzMc3fsIVeGvAfynoWJV68KUhvyV3Q1Rppt5JWt0iiFgqUr2atEBZBHIKzDFWSE8ypJBSYhiQ/s720/WhatsApp%20Image%202022-11-25%20at%2009.57.27.jpeg',
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
