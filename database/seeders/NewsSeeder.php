<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use App\Models\User;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('username', 'admin')->first();
        
        if (!$admin) {
            $this->command->error('Admin user not found! Please run RolePermissionSeeder first.');
            return;
        }

        $companyNews = NewsCategory::where('slug', 'company-news')->first();
        $industryInsights = NewsCategory::where('slug', 'industry-insights')->first();
        $productUpdates = NewsCategory::where('slug', 'product-updates')->first();

        $innovationTag = NewsTag::where('slug', 'innovation')->first();
        $technologyTag = NewsTag::where('slug', 'technology')->first();
        $businessGrowthTag = NewsTag::where('slug', 'business-growth')->first();

        $news = [
            [
                'title' => 'Semesta Services Expands Operations to New Cities',
                'slug' => 'semesta-services-expands-operations-to-new-cities',
                'excerpt' => 'We are excited to announce our expansion into three new cities, bringing our professional facility management services to more businesses.',
                'content' => '<p>We are thrilled to announce a significant milestone in our company\'s growth. Semesta Services is expanding its operations to three new cities: Surabaya, Bandung, and Medan.</p><p>This expansion reflects our commitment to providing world-class facility management services across Indonesia. Our new offices will offer the same high-quality parking management, security, and cleaning services that our clients have come to trust.</p><p>With this expansion, we aim to serve more businesses and contribute to the professional facility management industry in these regions.</p>',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&q=80',
                'category_id' => $companyNews?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Semesta Services Expands to New Cities',
                'meta_description' => 'Semesta Services announces expansion to Surabaya, Bandung, and Medan',
            ],
            [
                'title' => 'The Future of Smart Parking Technology',
                'slug' => 'the-future-of-smart-parking-technology',
                'excerpt' => 'Discover how smart parking technology is revolutionizing the way we manage parking facilities and improve user experience.',
                'content' => '<p>Smart parking technology is transforming the parking industry. With innovations like QR code scanning, automated payment systems, and real-time availability tracking, parking has never been more convenient.</p><p>At Semesta Services, we have implemented cutting-edge smart parking solutions that reduce wait times, improve security, and enhance the overall user experience.</p><p>Our SCAN-TAP-GO system allows users to enter and exit parking facilities seamlessly, making parking management more efficient than ever before.</p>',
                'image' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=1200&q=80',
                'category_id' => $industryInsights?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'meta_title' => 'Smart Parking Technology - The Future is Here',
                'meta_description' => 'Learn about the latest innovations in smart parking technology',
            ],
            [
                'title' => 'New Mobile App for Facility Management',
                'slug' => 'new-mobile-app-for-facility-management',
                'excerpt' => 'Introducing our new mobile app that makes facility management easier and more accessible for our clients.',
                'content' => '<p>We are proud to launch our new mobile application designed to streamline facility management for our clients.</p><p>The app provides real-time monitoring, instant notifications, service requests, and detailed reporting - all at your fingertips.</p><p>Available on both iOS and Android, our app ensures that you stay connected with your facility management team 24/7.</p>',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=1200&q=80',
                'category_id' => $productUpdates?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'meta_title' => 'New Mobile App Launch',
                'meta_description' => 'Download our new facility management mobile app',
            ],
            [
                'title' => 'Best Practices for Office Cleaning During Pandemic',
                'slug' => 'best-practices-for-office-cleaning-during-pandemic',
                'excerpt' => 'Learn about the enhanced cleaning protocols we have implemented to ensure safe and hygienic work environments.',
                'content' => '<p>In response to the ongoing health concerns, we have enhanced our cleaning protocols to meet the highest hygiene standards.</p><p>Our team uses hospital-grade disinfectants, follows strict sanitization schedules, and focuses on high-touch areas to minimize the spread of germs.</p><p>We are committed to providing safe and clean environments for all our clients.</p>',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1200&q=80',
                'category_id' => $industryInsights?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'meta_title' => 'Office Cleaning Best Practices',
                'meta_description' => 'Enhanced cleaning protocols for safe work environments',
            ],
            [
                'title' => 'Semesta Services Wins Best Facility Management Award 2024',
                'slug' => 'semesta-services-wins-best-facility-management-award-2024',
                'excerpt' => 'We are honored to receive the Best Facility Management Company award for our outstanding service and innovation.',
                'content' => '<p>We are incredibly proud to announce that Semesta Services has been awarded the Best Facility Management Company 2024 by the Indonesian Facility Management Association.</p><p>This recognition is a testament to our team\'s dedication, innovation, and commitment to excellence in serving our clients.</p><p>Thank you to all our clients and partners for your continued trust and support.</p>',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&q=80',
                'category_id' => $companyNews?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'meta_title' => 'Semesta Services Wins Award 2024',
                'meta_description' => 'Best Facility Management Company award winner',
            ],
        ];

        foreach ($news as $newsData) {
            $newsItem = News::create($newsData);
            
            // Attach tags
            if ($innovationTag && $technologyTag && $businessGrowthTag) {
                $newsItem->tags()->attach([
                    $innovationTag->id,
                    $technologyTag->id,
                    $businessGrowthTag->id,
                ]);
            }
        }

        $this->command->info('News articles seeded successfully!');
    }
}
