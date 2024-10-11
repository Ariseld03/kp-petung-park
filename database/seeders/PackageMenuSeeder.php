<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PackageMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve a list of existing package IDs
        $packageIds = DB::table('packages')->orderBy('id')->pluck('id');
        
        // Retrieve a list of existing menu IDs
        $menuIds = DB::table('menus')->orderBy('id')->pluck('id');
        
        // Retrieve a list of existing menu category IDs (assuming category_id refers to menu_id here)
        $menuCategoryIds = DB::table('categories')->orderBy('id')->pluck('id');

        // Ensure we have at least one package, menu, and menu category to reference
        if ($packageIds->isEmpty() || $menuIds->isEmpty() || $menuCategoryIds->isEmpty()) {
            $this->command->info('No packages, menus, or menu categories found. Please seed the related tables first.');
            return;
        }

        // Insert multiple records into the package_menus table
        DB::table('package_menus')->insert([
            [
                'package_id' => $packageIds->random(),
                'menu_id' => $menuIds->random(),
                'menu_category_id' => $menuCategoryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'package_id' => $packageIds->random(),
                'menu_id' => $menuIds->random(),
                'menu_category_id' => $menuCategoryIds->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
