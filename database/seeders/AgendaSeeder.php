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
                'event_name' => 'Kegiatan Bermain Air',
                'event_start_date' => '2024-03-15',
                'event_end_date' => '2024-03-15',
                'event_location' => 'Baby Pool',
                'status' => 1,
                'description' => 'Agenda ini dihadiri oleh keluarga-keluarga yang membawa anak-anak untuk bermain air di kolam khusus. Para peserta dapat menikmati berbagai aktivitas air yang menyenangkan, dengan fasilitas yang aman dan diawasi oleh petugas profesional.',
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Ulang Tahun Desa Belik',
                'event_start_date' => '2024-01-01',
                'event_end_date' => '2024-01-02',
                'event_location' => 'Pujasera',
                'status' => 1,
                'description' => 'Perayaan ulang tahun Desa Belik mengundang seluruh warga desa serta tamu dari luar daerah untuk merayakan momen bersejarah ini. Acara ini dipenuhi dengan hiburan tradisional, pasar rakyat, dan lomba-lomba yang melibatkan semua kalangan, mulai dari anak-anak hingga orang dewasa.',
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Acara Pembukaan Hutan Bambu',
                'event_start_date' => '2024-12-31',
                'event_end_date' => '2024-12-31',
                'event_location' => 'Hutan Bambu',
                'status' => 1,
                'description' => 'Dihadiri oleh para pecinta alam dan masyarakat lokal, acara ini merayakan pembukaan Hutan Bambu sebagai destinasi wisata baru. Acara ini juga menampilkan tur edukatif tentang pentingnya menjaga ekosistem hutan dan aktivitas tracking singkat di sekitar hutan bambu',
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Pembukaan Tempat Kemah',
                'event_start_date' => '2024-03-15',
                'event_end_date' => '2024-03-15',
                'event_location' => 'Area Kemah',
                'status' => 1,
                'description' => 'Tempat kemah baru dibuka di lokasi strategis dengan pemandangan alam yang indah, dihadiri oleh komunitas berkemah dan wisatawan lokal. Pembukaan ini dilengkapi dengan acara api unggun, penampilan musik akustik, dan sesi orientasi bagi para peserta tentang aturan dan fasilitas berkemah.',
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Hash Oktober 2024',
                'event_start_date' => '2024-10-01',
                'event_end_date' => '2024-10-02',
                'event_location' => 'Hutan Bambu',
                'status' => 1,
                'description' => 'Kegiatan Hash Oktober 2024 diikuti oleh kelompok pelari dan pejalan kaki dari berbagai daerah, melintasi jalur menantang di Hutan Bambu. Acara ini menggabungkan olahraga, petualangan, dan kebersamaan, dengan titik akhir di lokasi perkemahan yang asri.',
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
            [
                'event_name' => 'Hash July 2024',
                'event_start_date' => '2024-07-01',
                'event_end_date' => '2024-07-01',
                'event_location' => 'Hutan Bambu',
                'status' => 0,
                'description' => 'Hash July 2024 mengundang komunitas tracking dan pelari untuk menjelajahi jalur pegunungan dan hutan di sekitar Petung Park. Para peserta menaklukkan berbagai medan alam yang bervariasi, menikmati keindahan panorama alam, dan berbagi cerita petualangan di akhir acara.',
                'created_at' => now(),
                'updated_at' => now(),
                'staff_email' => $staffEmails->random(),
            ],
        ]);
    }
}
