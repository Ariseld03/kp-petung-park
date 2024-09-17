<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Retrieve a list of existing staff emails
        $staffEmails = DB::table('staffs')->pluck('email');

        // Retrieve a list of existing gallery IDs
        $galleryIds = DB::table('galleries')->pluck('id');

        // Retrieve a list of existing category IDs
        $categoryIds = DB::table('categories')->pluck('id');

        // Ensure we have at least one staff, gallery, and category to reference
        if ($staffEmails->isEmpty() || $galleryIds->isEmpty() || $categoryIds->isEmpty()) {
            $this->command->info('No staff, galleries, or categories found. Please seed the related tables first.');
            return;
        }

        // Insert multiple records into the menus table
        DB::table('menus')->insert([
            [
                'name' => 'Kentang Goreng',
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 50000, 200000), // Random price between 50,000 and 200,000
                'status' => 1,
                'status_recommended' => 1,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds->random(),
                'category_id' => $categoryIds->random(),
            ],
            [
                'name' => 'Nasi Goreng',
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 50000, 200000), // Random price between 50,000 and 200,000
                'status' => 1,
                'status_recommended' => 0,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds->random(),
                'category_id' => $categoryIds->random(),
            ],
            [
                'name' => 'Ayam Geprek',
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 30000, 150000), // Random price between 30,000 and 150,000
                'status' => 0,
                'status_recommended' => 1,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds->random(),
                'category_id' => $categoryIds->random(),
            ],
            [
                'name' => 'Ayam Goreng',
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 60000, 250000), // Random price between 60,000 and 250,000
                'status' => 1,
                'status_recommended' => 0,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds->random(),
                'category_id' => $categoryIds->random(),
            ],
            [
                'name' => 'Bebek Ngos',
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 70000, 300000), // Random price between 70,000 and 300,000
                'status' => 0,
                'status_recommended' => 1,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds->random(),
                'category_id' => $categoryIds->random(),
            ],
        ]);
    }
}
