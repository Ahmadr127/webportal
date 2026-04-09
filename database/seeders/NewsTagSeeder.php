<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewsTag;

class NewsTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Inovasi', 'slug' => 'inovasi'],
            ['name' => 'Transformasi Digital', 'slug' => 'transformasi-digital'],
            ['name' => 'Pertumbuhan Bisnis', 'slug' => 'pertumbuhan-bisnis'],
            ['name' => 'Kesuksesan Pelanggan', 'slug' => 'kesuksesan-pelanggan'],
            ['name' => 'Teknologi', 'slug' => 'teknologi'],
            ['name' => 'Produktivitas', 'slug' => 'produktivitas'],
            ['name' => 'Keamanan', 'slug' => 'keamanan'],
            ['name' => 'Komputasi Awan', 'slug' => 'komputasi-awan'],
            ['name' => 'AI & Pembelajaran Mesin', 'slug' => 'ai-machine-learning'],
            ['name' => 'Analisis Data', 'slug' => 'analisis-data'],
            ['name' => 'Seluler', 'slug' => 'seluler'],
            ['name' => 'Pengembangan Web', 'slug' => 'pengembangan-web'],
            ['name' => 'Praktik Terbaik', 'slug' => 'praktik-terbaik'],
            ['name' => 'Tips & Trik', 'slug' => 'tips-trik'],
            ['name' => 'Berita Industri', 'slug' => 'berita-industri'],
        ];

        foreach ($tags as $tag) {
            NewsTag::updateOrCreate(['slug' => $tag['slug']], $tag);
        }

        $this->command->info('News tags seeded successfully!');
    }
}
