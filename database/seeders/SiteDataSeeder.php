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
        SiteSetting::updateOrCreate(['id' => 1], [
                'app_name' => 'Semesta Services',
                'app_tagline' => 'Tenaga Kerja Andal untuk Operasional yang Aman dan Efisien',
                'primary_color' => '#107BC1',
                'secondary_color' => '#34B1EF',
            ]);

        // Create default contact info (only if not exists)
ContactInfo::updateOrCreate(['id' => 1], [
                'phone_1' => '0251 8318456 ext260',
                'phone_2' => '',
                'email' => 'admin@semestaservices.co.id',
                'address' => 'Jl. Raya Pajajaran No. 219, Bantarjati, Kota Bogor 16153',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.542665139219!2d106.80491887443038!3d-6.579251364314346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c42e35fd5fd3%3A0x5497922a2532233!2sRumah%20Sakit%20Azra%20Bogor!5e0!3m2!1sid!2sid!4v1765931765352!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
                'facebook_url' => 'https://facebook.com',
                'instagram_url' => 'https://instagram.com',
                'twitter_url' => 'https://twitter.com',
                'whatsapp' => '6289504886639',
            ]);
    }
}