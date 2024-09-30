<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(TravelSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(GalleriesShowSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(AgendaSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(GenericSeeder::class);
        $this->call(PackageMenuSeeder::class);
        $this->call(TravelGallerySeeder::class);
        $this->call(ArticleGallerySeeder::class);
        $this->call(SlidersHomeSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
