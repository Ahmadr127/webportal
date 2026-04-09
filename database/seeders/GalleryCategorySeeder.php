<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryCategory;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Kantor',
                'slug' => 'kantor',
                'description' => 'Ruang kantor dan lingkungan kerja kami',
                'is_active' => true,
            ],
            [
                'name' => 'Tim',
                'slug' => 'tim',
                'description' => 'Anggota tim kami yang luar biasa',
                'is_active' => true,
            ],
            [
                'name' => 'Acara',
                'slug' => 'acara',
                'description' => 'Acara dan perayaan perusahaan',
                'is_active' => true,
            ],
            [
                'name' => 'Proyek',
                'slug' => 'proyek',
                'description' => 'Proyek dan pekerjaan kami yang sudah selesai',
                'is_active' => true,
            ],
            [
                'name' => 'Produk',
                'slug' => 'produk',
                'description' => 'Foto produk dan demonstrasi',
                'is_active' => true,
            ],
            [
                'name' => 'Penghargaan',
                'slug' => 'penghargaan',
                'description' => 'Penghargaan dan pengakuan',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            GalleryCategory::updateOrCreate(['slug' => $category['slug']], $category);
        }

        $this->command->info('Gallery categories seeded successfully!');
    }
}
