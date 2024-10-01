<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AgendaSeeder extends Seeder
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

        // Insert multiple records into the agendas table
        DB::table('agendas')->insert([
            [
                'event_name' => 'Tradisi Hutan Bambu',
                'event_start_date' => $faker->date('Y-m-d'),
                'event_end_date' => $faker->time(),
                'event_location' => 'Gazebo',
                'status' => 1,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Acara Ulang Tahun Desa Belik',
                'event_start_date' => $faker->date('Y-m-d'),
                'event_end_date' => $faker->time(),
                'event_location' => 'Rumah Makan Petung Park',
                'status' => 1,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Acara Pembukaaan Hutan Bambu',
                'event_start_date' => $faker->date('Y-m-d'),
                'event_end_date' => $faker->time(),
                'event_location' => 'Hutan Bambu',
                'status' => 0,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Pembukaan Tempat Kemah',
                'event_start_date' => $faker->date('Y-m-d'),
                'event_end_date' => $faker->time(),
                'event_location' => 'Area Kemah',
                'status' => 1,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Hash Oktober 2024',
                'event_start_date' => $faker->date('Y-m-d'),
                'event_end_date' => $faker->time(),
                'event_location' => 'Hutan Bambu',
                'status' => 0,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
        ]);
    }
}
