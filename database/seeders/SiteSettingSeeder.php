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
                'app_name' => 'Semesta Services',
                'app_tagline' => 'Tenaga Kerja Andal untuk Operasional yang Aman dan Efisien',
                'logo' => null,
                'favicon' => null,
                'primary_color' => '#107BC1',
                'secondary_color' => '#34B1EF',
                'meta_description' => 'Penyedia Jasa Pengelola Parkir, Jasa Keamanan Satpam & Jasa Cleaning Service terbaik',
                'meta_keywords' => 'parkir, cleaning service, security, satpam, facility management',
            ]
        );
    }
}
