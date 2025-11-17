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
            'app_name' => 'EZ Services',
            'app_tagline' => 'Jasa Pengelola Parkir, Jasa Keamanan dan Jasa Cleaning Service',
            'primary_color' => '#04726d',
            'secondary_color' => '#71b346',
        ]);

        // Create default contact info
        ContactInfo::updateOrCreate([], [
            'phone_1' => '021-26692269',
            'phone_2' => '021-22692977',
            'email' => 'contact@ezservices.co.id',
            'address' => 'Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230',
            'facebook_url' => 'https://facebook.com',
            'instagram_url' => 'https://instagram.com',
            'twitter_url' => 'https://twitter.com',
        ]);
    }
}