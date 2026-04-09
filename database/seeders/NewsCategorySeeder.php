<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Berita Perusahaan',
                'slug' => 'berita-perusahaan',
                'description' => 'Pembaruan dan pengumuman terbaru dari perusahaan kami',
                'is_active' => true,
            ],
            [
                'name' => 'Wawasan Industri',
                'slug' => 'wawasan-industri',
                'description' => 'Wawasan ahli dan tren di industri kami',
                'is_active' => true,
            ],
            [
                'name' => 'Pembaruan Produk',
                'slug' => 'pembaruan-produk',
                'description' => 'Fitur baru dan perbaikan pada produk kami',
                'is_active' => true,
            ],
            [
                'name' => 'Acara',
                'slug' => 'acara',
                'description' => 'Acara, webinar, dan konferensi mendatang',
                'is_active' => true,
            ],
            [
                'name' => 'Studi Kasus',
                'slug' => 'studi-kasus',
                'description' => 'Kisah sukses dari klien kami',
                'is_active' => true,
            ],
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'description' => 'Tren dan inovasi teknologi terbaru',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            NewsCategory::updateOrCreate(['slug' => $category['slug']], $category);
        }

        $this->command->info('News categories seeded successfully!');
    }
}
