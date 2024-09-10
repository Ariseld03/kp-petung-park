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
                'event_name' => 'Annual Company Meeting',
                'event_start_date' => $faker->date(),
                'event_end_date' => $faker->time(),
                'event_location' => 'Main Conference Room',
                'status' => 1,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Team Building Activity',
                'event_start_date' => $faker->date(),
                'event_end_date' => $faker->time(),
                'event_location' => 'Outdoor Park',
                'status' => 1,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Project Kickoff Meeting',
                'event_start_date' => $faker->date(),
                'event_end_date' => $faker->time(),
                'event_location' => 'Meeting Room A',
                'status' => 0,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Year-End Party',
                'event_start_date' => $faker->date(),
                'event_end_date' => $faker->time(),
                'event_location' => 'Grand Ballroom',
                'status' => 1,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Client Presentation',
                'event_start_date' => $faker->date(),
                'event_end_date' => $faker->time(),
                'event_location' => 'Conference Hall B',
                'status' => 0,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
        ]);
    }
}
