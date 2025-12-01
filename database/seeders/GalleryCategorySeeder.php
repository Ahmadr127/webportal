<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryCategory;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Office',
                'slug' => 'office',
                'description' => 'Our office spaces and work environment',
                'is_active' => true,
            ],
            [
                'name' => 'Team',
                'slug' => 'team',
                'description' => 'Our amazing team members',
                'is_active' => true,
            ],
            [
                'name' => 'Events',
                'slug' => 'events',
                'description' => 'Company events and celebrations',
                'is_active' => true,
            ],
            [
                'name' => 'Projects',
                'slug' => 'projects',
                'description' => 'Our completed projects and work',
                'is_active' => true,
            ],
            [
                'name' => 'Products',
                'slug' => 'products',
                'description' => 'Product photos and demonstrations',
                'is_active' => true,
            ],
            [
                'name' => 'Awards',
                'slug' => 'awards',
                'description' => 'Awards and recognitions',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            GalleryCategory::create($category);
        }

        $this->command->info('Gallery categories seeded successfully!');
    }
}
