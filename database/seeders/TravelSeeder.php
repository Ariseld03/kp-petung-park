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
                'description' => 'Perjalanan yang menakjubkan melalui Hutan Bambu, menawarkan keindahan alam yang memukau dan suasana yang tenang di Bali.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kemah',
                'description' => 'Nikmati sensasi mendaki, berski, dan pemandangan yang menakjubkan di pegunungan Alps yang megah, ideal untuk petualangan outdoor.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meja Kecek',
                'description' => 'Temukan keanekaragaman hayati Kenya melalui pengalaman safari yang mendebarkan di jantung sabana yang luas.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kolam Bayi',
                'description' => 'Meskipun statusnya tidak aktif, Kolam Bayi menawarkan peluang untuk menikmati budaya dan sejarah Jepang, mulai dari kuil kuno hingga kota modern.',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pondok Bambu',
                'description' => 'Rasakan liburan santai di Pondok Bambu dengan pemandangan pantai yang menawan di Karibia, dikelilingi oleh air yang jernih dan langit cerah.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pujasera',
                'description' => 'Menawarkan pengalaman kuliner yang menyenangkan, Pujasera adalah tempat berkumpul untuk menikmati berbagai hidangan lezat sambil bersantai di lingkungan yang nyaman.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
