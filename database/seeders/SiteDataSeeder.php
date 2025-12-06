<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;
use App\Models\ContactInfo;

class SiteDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default site settings (only if not exists)
        if (!SiteSetting::exists()) {
            SiteSetting::create([
                'app_name' => 'Semesta Services',
                'app_tagline' => 'Tenaga Kerja Andal untuk Operasional yang Aman dan Efisien',
                'primary_color' => '#107BC1',
                'secondary_color' => '#34B1EF',
            ]);
        }

        // Create default contact info (only if not exists)
        if (!ContactInfo::exists()) {
            ContactInfo::create([
                'phone_1' => '021-xxx-xxxx',
                'phone_2' => '021-xxx-xxxx',
                'email' => 'xxx@semestaservices.co.id',
                'address' => 'Jl. xxx',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9999999999995!2d106.8!3d-6.15!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDknMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'twitter_url' => 'https://twitter.com',
            ]);
        }
    }
}