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
        $login = '/images/login/';

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
                'photo_link' => $pemandangan.'pelatihanPrima_3.jpg',
                'description' => "Pelatihan Pelayanan Prima diselenggarakan oleh Ubaya",
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo Lesehan',
                'photo_link' => $pemandangan.'rapatPengembanganDesaWisata.JPG',
                'description' => $faker->sentence,
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jalan Hutan Bambu',
                'photo_link' => $pemandangan.'jalanHutanBambu.JPG',
                'description' => 'Jalur rindang dengan pepohonan bambu tinggi yang menciptakan suasana asri dan sejuk.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gazebo',
                'photo_link' => $pemandangan.'gazeboUntukAcara.JPG',
                'description' => 'Tempat bersantai dengan pemandangan alam terbuka yang cocok untuk beristirahat setelah beraktivitas.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sumber Air',
                'photo_link' => $pemandangan.'sumberMataAir.JPG',
                'description' => 'Aliran air alami yang jernih dan segar, menjadi daya tarik utama di sekitar kawasan wisata.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hutan Bambu',
                'photo_link' => $pemandangan.'pohonBambu.JPG',
                'description' => 'Jalur rindang dengan pepohonan bambu tinggi yang menciptakan suasana asri dan sejuk.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Bayi',
                'photo_link' => $pemandangan.'kolamBayi.JPG',
                'description' => 'Kolam renang aman dengan kedalaman rendah yang dirancang khusus untuk anak-anak.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera',
                'photo_link' => $pemandangan . 'pujaseraTampakLuar.jpg', // Correct concatenation
                'description' => 'Tempat makan dengan berbagai pilihan kuliner tradisional dan modern untuk pengunjung.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tempe Goreng',
                'photo_link' => $makanan.'tempeGoreng.jpg',
                'description' => 'Tempe goreng renyah yang disajikan dengan sambal khas, cocok sebagai camilan atau lauk.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bebek Goreng Ngos',
                'photo_link' => $makanan.'bebekngos.jpg',
                'description' => 'Bebek goreng yang empuk dan gurih dengan bumbu tradisional, disajikan dengan sambal pedas.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Hemat Makanan 5-6 Orang',
                'photo_link' => $makanan.'pakethemat.jpg',
                'description' => 'Hidangan lengkap dan lezat yang cocok untuk dinikmati bersama keluarga atau teman.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nasi Goreng',
                'photo_link' => $makanan.'nasigorengpetung.jpg',
                'description' => 'Nasi goreng khas dengan campuran sayuran dan daging, disajikan hangat dengan pelengkap kerupuk.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Teh Manis',
                'photo_link' => $makanan.'esTehManis.jpeg',
                'description' => 'Minuman segar dengan rasa teh manis yang dingin, pas untuk menghilangkan dahaga.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kentang Goreng',
                'photo_link' =>$makanan.'kentangGoreng.jpg',
                'description' =>'Kentang goreng renyah dengan tekstur lembut di dalam, cocok sebagai camilan atau pelengkap makanan.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Es Krim Stroberi',
                'photo_link' => $makanan.'icecreamstraw.jpg',
                'description' => 'Es krim stroberi yang manis dan lembut, memberikan sensasi segar dengan rasa buah yang alami.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ayam Geprek',
                'photo_link' => $makanan.'ayamsambaltrancam.jpg',
                'description' => 'Ayam goreng yang digeprek dengan sambal pedas, disajikan dengan nasi hangat dan lalapan.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Profile Picture',
                'photo_link' => $login.'profilePic.jpg',
                'description' => 'Saya Amel sebagai admin.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemah',
                'photo_link' => $pemandangan.'kemah.jpg',
                'description' => 'Tidur dan bersantai sembari menikmati keindahan alam.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jalan Hutan Bambu 2',
                'photo_link' => $pemandangan.'jalanHutanBambu_2.JPG',
                'description' => 'Jalanan Pohon Bambu yang menakjubkan.',
                'status' => 1,
                'number_love' => $faker->numberBetween(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
