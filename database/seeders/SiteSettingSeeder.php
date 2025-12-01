<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'app_name' => 'EZ Services',
                'app_tagline' => 'Professional Facility Management',
                'logo' => null,
                'favicon' => null,
                'primary_color' => '#04726d',
                'secondary_color' => '#71b346',
                'meta_description' => 'Penyedia Jasa Pengelola Parkir, Jasa Keamanan Satpam & Jasa Cleaning Service terbaik',
                'meta_keywords' => 'parkir, cleaning service, security, satpam, facility management',
            ]
        );
    }
}
