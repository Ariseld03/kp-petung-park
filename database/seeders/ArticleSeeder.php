<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
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

        // Retrieve a list of existing agenda IDs
        $agendaIds = DB::table('agendas')->pluck('id');

        // Ensure we have at least one staff and one agenda to reference
        if ($staffEmails->isEmpty() || $agendaIds->isEmpty()) {
            $this->command->info('No staff or agendas found. Please seed the staffs and agendas tables first.');
            return;
        }

        // Insert multiple records into the articles table
        DB::table('articles')->insert([
            [
                'title' => 'New Policy Updates',
                'main_content' => $faker->paragraphs(3, true),
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Upcoming Company Retreat',
                'main_content' => $faker->paragraphs(3, true),
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Quarterly Financial Report',
                'main_content' => $faker->paragraphs(3, true),
                'status' => 0,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Client Feedback Summary',
                'main_content' => $faker->paragraphs(3, true),
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Product Launch Details',
                'main_content' => $faker->paragraphs(3, true),
                'status' => 0,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
