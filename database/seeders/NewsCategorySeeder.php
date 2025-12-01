<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Company News',
                'slug' => 'company-news',
                'description' => 'Latest updates and announcements from our company',
                'is_active' => true,
            ],
            [
                'name' => 'Industry Insights',
                'slug' => 'industry-insights',
                'description' => 'Expert insights and trends in our industry',
                'is_active' => true,
            ],
            [
                'name' => 'Product Updates',
                'slug' => 'product-updates',
                'description' => 'New features and improvements to our products',
                'is_active' => true,
            ],
            [
                'name' => 'Events',
                'slug' => 'events',
                'description' => 'Upcoming events, webinars, and conferences',
                'is_active' => true,
            ],
            [
                'name' => 'Case Studies',
                'slug' => 'case-studies',
                'description' => 'Success stories from our clients',
                'is_active' => true,
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Latest technology trends and innovations',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            NewsCategory::create($category);
        }

        $this->command->info('News categories seeded successfully!');
    }
}
