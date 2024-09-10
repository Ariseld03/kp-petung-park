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
        // Seed categories
        $this->call(CategorySeeder::class);

        // Seed packages
        $this->call(PackageSeeder::class);
        
        // Seed article_gallery
        $this->call(TravelSeeder::class);
 
        // Seed galleries
        $this->call(GallerySeeder::class);
 
        // Seed gallery_show
        $this->call(GalleriesShowSeeder::class);
 
        // Seed staffs
        $this->call(StaffSeeder::class);
 
        // Seed agendas
        $this->call(AgendaSeeder::class);
 
        // Seed articles
        $this->call(ArticleSeeder::class);
 
        // Seed menus
        $this->call(MenuSeeder::class);
 
        // Seed generics
        $this->call(GenericSeeder::class);
 
        // Seed package_menus
        $this->call(PackageMenuSeeder::class);
 
        // Seed travel_gallery
        $this->call(TravelGallerySeeder::class);

        // Seed article_gallery
        $this->call(ArticleGallerySeeder::class);

        // Seed sliders_home
        $this->call(SlidersHomeSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
