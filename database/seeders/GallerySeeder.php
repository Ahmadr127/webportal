<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officeCategory = GalleryCategory::where('slug', 'office')->first();
        $teamCategory = GalleryCategory::where('slug', 'team')->first();
        $eventsCategory = GalleryCategory::where('slug', 'events')->first();
        $projectsCategory = GalleryCategory::where('slug', 'projects')->first();

        $images = [
            // Office Images
            [
                'title' => 'Modern Office Space',
                'description' => 'Our modern and comfortable office environment',
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
                'category_id' => $officeCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Reception Area',
                'description' => 'Welcoming reception area for our visitors',
                'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&q=80',
                'category_id' => $officeCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Meeting Room',
                'description' => 'State-of-the-art meeting facilities',
                'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=800&q=80',
                'category_id' => $officeCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
            
            // Team Images
            [
                'title' => 'Our Professional Team',
                'description' => 'Dedicated team members working together',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80',
                'category_id' => $teamCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Security Team',
                'description' => 'Our trained security personnel',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80',
                'category_id' => $teamCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Cleaning Staff',
                'description' => 'Professional cleaning team at work',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',
                'category_id' => $teamCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
            
            // Events Images
            [
                'title' => 'Annual Company Gathering',
                'description' => 'Team building and celebration event',
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&q=80',
                'category_id' => $eventsCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Training Workshop',
                'description' => 'Professional development training session',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80',
                'category_id' => $eventsCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Award Ceremony',
                'description' => 'Celebrating excellence and achievements',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80',
                'category_id' => $eventsCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
            
            // Projects Images
            [
                'title' => 'Smart Parking System',
                'description' => 'QR-based parking management implementation',
                'image' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=800&q=80',
                'category_id' => $projectsCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Office Complex Security',
                'description' => 'Comprehensive security system installation',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80',
                'category_id' => $projectsCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Mall Cleaning Project',
                'description' => 'Large-scale commercial cleaning services',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',
                'category_id' => $projectsCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($images as $image) {
            GalleryImage::create($image);
        }

        $this->command->info('Gallery images seeded successfully!');
    }
}
