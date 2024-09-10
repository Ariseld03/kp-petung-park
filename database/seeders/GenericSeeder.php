<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GenericSeeder extends Seeder
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

        // Ensure we have at least one staff to reference
        if ($staffEmails->isEmpty()) {
            $this->command->info('No staff found. Please seed the staffs table first.');
            return;
        }

        // Insert multiple records into the generic table
        DB::table('generic')->insert([
            [
                'key' => 'site_title',
                'value' => 'My Awesome Website',
                'status' => 1,
                'icon_picture_link' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'key' => 'site_description',
                'value' => 'The best website for all your needs.',
                'status' => 1,
                'icon_picture_link' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'key' => 'contact_email',
                'value' => 'contact@example.com',
                'status' => 0,
                'icon_picture_link' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'key' => 'footer_text',
                'value' => '© 2024 My Awesome Website. All rights reserved.',
                'status' => 1,
                'icon_picture_link' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'key' => 'support_phone',
                'value' => '+1234567890',
                'status' => 1,
                'icon_picture_link' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
        ]);
    }
}
