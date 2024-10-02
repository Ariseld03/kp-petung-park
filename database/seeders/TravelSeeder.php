<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('travels')->insert([
            [
                'name' => 'Hutan Bambu',
                'description' => 'A wonderful journey through the beautiful island of Bali, known for its beaches, temples, and culture.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemah',
                'description' => 'Experience the thrill of hiking, skiing, and breathtaking views in the majestic Alps.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meja Kecek',
                'description' => 'Discover the wildlife of Kenya with an exciting safari experience in the heart of the savannah.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Bayi',
                'description' => 'Immerse yourself in the rich culture and history of Japan, from ancient temples to modern cities.',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pondok Bambu',
                'description' => 'Enjoy a relaxing vacation on the pristine beaches of the Caribbean, with crystal-clear waters and sunny skies.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera',
                'description' => 'Enjoy a relaxing vacation on the pristine beaches of the Caribbean, with crystal-clear waters and sunny skies.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
