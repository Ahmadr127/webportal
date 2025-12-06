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
        // Create default site settings
        SiteSetting::updateOrCreate([], [
            'app_name' => 'Semesta Services',
            'app_tagline' => 'Tenaga Kerja Andal untuk Operasional yang Aman dan Efisien',
            'primary_color' => '#107BC1',
            'secondary_color' => '#34B1EF',
        ]);

        // Create default contact info
        ContactInfo::updateOrCreate([], [
            'phone_1' => '021-xxx-xxxx',
            'phone_2' => '021-xxx-xxxx',
            'email' => 'xxx@semestaservices.co.id',
            'address' => 'Jl. xxx',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'twitter_url' => 'https://twitter.com',
        ]);
    }
}