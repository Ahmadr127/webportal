<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsTag;

class NewsTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Innovation', 'slug' => 'innovation'],
            ['name' => 'Digital Transformation', 'slug' => 'digital-transformation'],
            ['name' => 'Business Growth', 'slug' => 'business-growth'],
            ['name' => 'Customer Success', 'slug' => 'customer-success'],
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Productivity', 'slug' => 'productivity'],
            ['name' => 'Security', 'slug' => 'security'],
            ['name' => 'Cloud Computing', 'slug' => 'cloud-computing'],
            ['name' => 'AI & Machine Learning', 'slug' => 'ai-machine-learning'],
            ['name' => 'Data Analytics', 'slug' => 'data-analytics'],
            ['name' => 'Mobile', 'slug' => 'mobile'],
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Best Practices', 'slug' => 'best-practices'],
            ['name' => 'Tips & Tricks', 'slug' => 'tips-tricks'],
            ['name' => 'Industry News', 'slug' => 'industry-news'],
        ];

        foreach ($tags as $tag) {
            NewsTag::create($tag);
        }

        $this->command->info('News tags seeded successfully!');
    }
}
