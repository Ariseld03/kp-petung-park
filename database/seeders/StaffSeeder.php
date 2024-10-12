<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Retrieve a list of existing gallery IDs
        $galleryIds = DB::table('galleries')->orderBy('id')->pluck('id');

        // Ensure we have at least one gallery to reference
        if ($galleryIds->isEmpty()) {
            $this->command->info('No galleries found. Please seed the galleries table first.');
            return;
        }

        // Insert multiple records into the staffs table
        DB::table('staffs')->insert([
            [
                'email' => 'Griseldaamelia68@gmail.com',
                'name' => 'Admin User',
                'password' => 'hai123', 
                'date_of_birth' => $faker->date(),
                'phone_number' => $faker->phoneNumber,
                'position' => 'admin',
                'gender' => 'laki-laki',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'gallery_id' => $galleryIds[18],
            ],
            [
                'email' => 'MagdalenaFelicia@gmail.com',
                'name' => 'Regular User',
                'password' => 'hai123', 
                'date_of_birth' => $faker->date(),
                'phone_number' => $faker->phoneNumber,
                'position' => 'user',
                'gender' => 'perempuan',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'gallery_id' => $galleryIds[18],
            ],
            [
                'email' => 'staff@gmail.com',
                'name' => 'Staff Member',
                'password' => 'hai123', 
                'date_of_birth' => $faker->date(),
                'phone_number' => $faker->phoneNumber,
                'position' => 'staff',
                'gender' => 'perempuan',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
                'gallery_id' => $galleryIds[18],
            ],
            [
                'email' => 'anotherstaff@gmail.com',
                'name' => 'Another Staff Member',
                'password' => 'hai123', 
                'date_of_birth' => $faker->date(),
                'phone_number' => $faker->phoneNumber,
                'position' => 'staff',
                'gender' => 'laki-laki',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'gallery_id' => $galleryIds[18],
            ],
        ]);
    }
}
