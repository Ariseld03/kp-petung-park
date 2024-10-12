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
        $agendaIds = DB::table('agendas')->orderBy('id')->pluck('id');

        // Ensure we have at least one staff and one agenda to reference
        if ($staffEmails->isEmpty() || $agendaIds->isEmpty()) {
            $this->command->info('No staff or agendas found. Please seed the staffs and agendas tables first.');
            return;
        }

        // Insert multiple records into the articles table
        DB::table('articles')->insert([
            [
                'title' => 'Tracking Pertama di bulan July 2024',
                'main_content' => "Bulan Juli 2024 menjadi momen istimewa bagi para pecinta alam dan petualangan.
                 Kegiatan wisata tracking yang pertama diadakan tahun ini menawarkan pengalaman tak terlupakan, 
                 dengan rute yang melintasi pegunungan hijau dan hutan lebat. Para peserta diajak menyusuri jalur alami yang menantang,
                  menikmati udara segar, serta keindahan panorama alam yang memukau. Tidak hanya menawarkan tantangan fisik, 
                  kegiatan ini juga menjadi ajang refleksi diri dan menguatkan jiwa petualang dalam diri setiap peserta. 
                  Dengan semangat kebersamaan, mereka menghadapi medan yang bervariasi, mulai dari jalur berbatu di pegunungan hingga trek lembut yang menyelimuti hutan.
                   Petualangan ini semakin sempurna dengan pemandangan matahari terbit dan suara alam yang menenangkan, menjadikan tracking pertama di bulan 
                   Juli 2024 sebagai pengalaman yang tak terlupakan.",
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds[5],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kemah in Petung Park',
                'main_content' => 'Petung Park, sebuah destinasi alam yang memikat di tengah kesejukan hutan pinus, menjadi lokasi ideal untuk
                 kegiatan kemah yang tak terlupakan. Berkemah di Petung Park memberikan pengalaman berbeda bagi para pecinta alam dan keluarga 
                 yang ingin merasakan nuansa alam terbuka. Suasana yang tenang, udara sejuk, dan rindangnya pepohonan pinus menciptakan harmoni
                  sempurna untuk melepas penat dari rutinitas sehari-hari. Para peserta kemah dapat menikmati berbagai aktivitas seperti trekking di jalur hutan, 
                  mengamati bintang di langit malam yang jernih, serta menikmati api unggun bersama teman atau keluarga. Dengan fasilitas yang nyaman dan lingkungan yang asri, 
                  Petung Park menjadi tempat yang sempurna untuk merasakan kedamaian dan keindahan alam, menjadikan momen kemah kali ini penuh kesan dan kebahagiaan.',
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds[3],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Pembukaan Wisata Hutan Bambu',
                'main_content' => 'Petung Park kembali menghadirkan destinasi wisata alam yang memikat dengan pembukaan Wisata Hutan Bambu. 
                Hutan bambu yang asri dan rindang ini menawarkan pengalaman baru bagi para pengunjung yang ingin menikmati kesejukan alam serta suasana yang tenang dan damai.
                 Dengan jalan setapak yang teratur di antara rumpun bambu yang menjulang tinggi, para wisatawan dapat merasakan kedekatan dengan alam sambil menikmati semilir angin yang menyejukkan.
                  Tidak hanya sebagai tempat rekreasi, wisata ini juga menjadi ajang edukasi untuk mengenal lebih dalam tentang ekosistem hutan bambu dan pentingnya menjaga kelestarian alam. 
                  Pembukaan Wisata Hutan Bambu di Petung Park menjadi langkah positif dalam memperkaya destinasi wisata alam di daerah ini, 
                  menawarkan keindahan yang menenangkan sekaligus memberikan ruang bagi pengunjung untuk berinteraksi dengan alam secara langsung.',
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' => $agendaIds[2],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tracking di Hutan Bambu Hash Oktober 2024',
                'main_content' => 'Oktober 2024 menjadi bulan yang ditunggu-tunggu oleh para penggemar petualangan alam dengan diadakannya acara Tracking di Hutan Bambu Petung Park Hash. 
                Mengusung konsep perjalanan menyusuri hutan bambu yang rimbun dan menyejukkan, kegiatan ini menghadirkan pengalaman yang penuh tantangan sekaligus menyegarkan.
                 Para peserta akan melintasi jalur yang telah disiapkan khusus, melewati pepohonan bambu yang menjulang tinggi, serta merasakan sejuknya suasana hutan yang jauh dari hiruk-pikuk kota.
                  Acara ini tidak hanya menguji fisik, tetapi juga mengajak para peserta untuk lebih dekat dengan alam. Dengan berbagai rintangan alami seperti jalur tanah berbatu dan akar bambu yang menjalar, 
                  tracking di Hutan Bambu Petung Park Hash menjanjikan sensasi petualangan yang unik dan penuh kegembiraan. Suasana yang asri, ditambah dengan kesempatan untuk bersosialisasi dengan sesama pecinta alam, 
                  menjadikan event ini sebagai salah satu kegiatan outdoor paling dinantikan di tahun ini.',
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' =>  $agendaIds[4],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Baby Pool sambil Menikmati Pemandangan Desa',
                'main_content' => 'Menghabiskan waktu di baby pool sambil menikmati pemandangan desa menjadi pilihan rekreasi yang sempurna untuk keluarga, 
                terutama bagi orang tua dengan anak kecil. Kolam renang khusus anak ini didesain dengan kedalaman yang aman, memungkinkan si kecil bermain air dengan riang dan bebas.
                 Sambil menemani anak-anak bermain, para orang tua dapat bersantai menikmati keindahan alam desa yang asri, dengan latar belakang hamparan sawah, perbukitan hijau, dan udara segar yang menenangkan.
                  Suasana pedesaan yang tenang dan jauh dari keramaian kota memberikan sensasi liburan yang menyejukkan hati dan pikiran. Baby pool ini tidak hanya menawarkan kesenangan bagi anak-anak, tetapi juga 
                  menjadi tempat bagi keluarga untuk merasakan kebersamaan dan harmoni dengan alam sekitar.',
                'status' => 1,
                'staff_email' => $staffEmails->random(),
                'agenda_id' =>  $agendaIds[0],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
