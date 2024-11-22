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
        $galleryIds = DB::table('galleries')->orderBy('id')->pluck('id');

        // Retrieve a list of existing category IDs
        $categoryIds = DB::table('categories')->orderBy('id')->pluck('id');

        // Ensure we have at least one staff, gallery, and category to reference
        if ($staffEmails->isEmpty() || $galleryIds->isEmpty() || $categoryIds->isEmpty()) {
            $this->command->info('No staff, galleries, or categories found. Please seed the related tables first.');
            return;
        }

        // Insert multiple records into the menus table
        DB::table('menus')->insert([
            [
                'name' => 'Stik Kentang',
                'description' => "Stik Kentang yang hangat dan enak, cocok dinikmati dengan bersantai",
                'price' => 10000,
                'status' => 1,
                'status_recommended' => 1,
                'number_love' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[15],
                'category_id' => $categoryIds[3],
            ],
            [
                'name' => 'Es Teh Manis',
                'description' => "Es teh yang berasa manis cocok untuk mendinginkan kepala",
                'price' => 7000,
                'status' => 1,
                'status_recommended' => 0,
                'number_love' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[14],
                'category_id' =>  $categoryIds[0],
            ],
            [
                'name' => 'Es Krim Stroberi',
                'description' => 'Es krim dari buah stroberi yang diolah dengan susu sapi.',
                'price' => $faker->randomFloat(0, 20000, 30000),
                'status' => 0,
                'status_recommended' => 1,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[16],
                'category_id' =>  $categoryIds[2],
            ],
            [
                'name' => 'Tempe Mendoan',
                'description' => 'Tempe yang dibalur tepung dan dimasak matang.',
                'price' => 10000,
                'status' => 1,
                'status_recommended' => 0,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[10],
                'category_id' =>  $categoryIds[3],
            ],
            [
                'name' => 'Bebek Ngos Petung',
                'description' => 'Bebek yang dibalur tepung dan dimasak matang dan dihidangkan bersama dengan sambal.',
                'price' => 28000,
                'status' => 1,
                'status_recommended' => 1,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[11],
                'category_id' =>  $categoryIds[1],
            ],
            [
                'name' => 'Ayam Geprek',
                'description' => 'Ayam krispi yang dipukul dan diberi dengan bumbu sambal pedas gurih.',
                'price' => 15000,
                'status' => 1,
                'status_recommended' => 1,
                'number_love' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[17],
                'category_id' => $categoryIds[1],
            ],
            [
                'name' => 'Es Kopi Susu',
                'description' => "Es Kopi Susu dapat dinikmati sambil menikmati udara pegunungan yang sejuk",
                'price' => 12000,
                'status' => 1,
                'status_recommended' => 0,
                'number_love' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
                'gallery_id' => $galleryIds[22],
                'category_id' =>  $categoryIds[0],
            ],
        ]);
    }
}
