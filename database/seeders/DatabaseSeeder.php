<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call RolePermissionSeeder first
        $this->call([
            RolePermissionSeeder::class,
            NewPermissionsSeeder::class, // Add new permissions for content management
            SiteDataSeeder::class,
            SliderSeeder::class,
            NewsCategorySeeder::class,
            NewsTagSeeder::class,
            GalleryCategorySeeder::class,
            AboutSectionSeeder::class,
            CompanyValueSeeder::class,
            StatSeeder::class,
        ]);

        // Create admin user first before seeding content
        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        
        User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role_id' => $adminRole->id,
        ]);

        // Seed content data (requires admin user to exist)
        $this->call([
            NewsSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            GallerySeeder::class,
        ]);
    }
}