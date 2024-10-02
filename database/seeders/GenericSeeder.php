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
                'created_at' => now(),
                'key' => 'link_tautan_website_desa',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => 'https://belik-mjkkab.desa.id/',
                'icon_picture_link' => null, // Add this line if the column exists
            ],
            [
                'created_at' => now(),
                'key' => 'sosial_media_instagram',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => 'https://www.instagram.com/petungparktrawasnew/?hl=en',
                'icon_picture_link' => 'https://png.pngtree.com/png-clipart/20230401/original/pngtree-three-dimensional-instagram-icon-png-image_9015419.png',
            ],
            [
                'created_at' => now(),
                'key' => 'sosial_media_tiktok',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => 'https://www.tiktok.com/@petungparktrawasnew?fbclid=PAZXh0bgNhZW0CMTEAAaavE7U4_iIUJ6DVAe5el2Frdvv4r1PWGBSwhBr5yTyBKjsFqaTEgp6-sSU_aem_wy-t6MY_1yGqZyNJmIjecQ',
                'icon_picture_link' => 'https://static.vecteezy.com/system/resources/thumbnails/016/716/450/small/tiktok-icon-free-png.png',
            ],
            [
                'created_at' => now(),
                'key' => 'sosial_media_youtube',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => 'https://youtube.com/channel/UCL5gPtEXsolRhYjpbXLYgmg',
                'icon_picture_link' =>'https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-youtube-social-media-round-icon-png-image_6315993.png',
            ],
            [
                'created_at' => now(),
                'key' => 'teks_footer',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => '©2024 Petung Park Trawas. All rights reserved.',
                'icon_picture_link' => null, // Add this line if the column exists
            ],
            [
                'created_at' => now(),
                'key' => 'kontak_whatsapp',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => '083132819058',
                'icon_picture_link' => '/images/footer/logoWA.png',
            ],
            [
                'created_at' => now(),
                'key' => 'alamat_petung_park_trawas',
                'staff_email' => $staffEmails->random(),
                'status' => 1,
                'updated_at' => now(),
                'value' => 'desa belik, dusun jibru, kecamatan trawas, kabupaten mojokerto, Trawas, Jawa Timur, Indonesia 61375',
                'icon_picture_link' => null, // Add this line if the column exists
            ],
        ]);
    }
}
