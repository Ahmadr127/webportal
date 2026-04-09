<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'who_we_are',
                'title' => 'Siapa Kami',
                'content' => 'Kami adalah perusahaan teknologi terkemuka yang berdedikasi menyediakan solusi inovatif untuk membantu bisnis tumbuh dan sukses di era digital. Dengan lebih dari 10 tahun pengalaman, kami telah membantu ratusan perusahaan mentransformasi operasi mereka dan mencapai tujuan mereka.',
                'image' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'section_key' => 'our_mission',
                'title' => 'Misi Kami',
                'content' => 'Misi kami adalah memberdayakan bisnis dengan solusi teknologi mutakhir yang mendorong pertumbuhan, efisiensi, dan inovasi. Kami berupaya menjadi mitra tepercaya bagi perusahaan yang ingin menavigasi kompleksitas transformasi digital.',
                'image' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'section_key' => 'our_vision',
                'title' => 'Visi Kami',
                'content' => 'Menjadi pemimpin global dalam menyediakan solusi teknologi inovatif yang mentransformasi bisnis dan meningkatkan taraf hidup. Kami memimpikan masa depan di mana teknologi terintegrasi secara mulus dengan operasi bisnis untuk menciptakan nilai yang belum pernah ada sebelumnya.',
                'image' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'section_key' => 'our_approach',
                'title' => 'Pendekatan Kami',
                'content' => 'Kami percaya pada pendekatan kolaboratif yang menempatkan klien kami di pusat semua yang kami lakukan. Tim kami bekerja erat dengan Anda untuk memahami tantangan unik Anda dan mengembangkan solusi khusus yang memberikan hasil nyata.',
                'image' => null,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            AboutSection::updateOrCreate(['section_key' => $section['section_key']], $section);
        }

        $this->command->info('About sections seeded successfully!');
    }
}
