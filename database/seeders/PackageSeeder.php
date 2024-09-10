<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'name' => 'Paket Hemat',
                'price' => rand(10000, 99999),
                'status' => 1,
                'number_love' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Rame-rame',
                'price' => rand(10000, 99999),
                'status' => 1,
                'number_love' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Ngedate',
                'price' => rand(10000, 99999),
                'status' => 1,
                'number_love' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Puas',
                'price' => rand(10000, 99999),
                'status' => 0,
                'number_love' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Panas',
                'price' => rand(10000, 99999),
                'status' => 1,
                'number_love' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
