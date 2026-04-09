<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyValue;

class CompanyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'icon' => 'fa-lightbulb',
                'title' => 'Inovasi',
                'description' => 'Kami terus mendorong batasan dan merangkul ide-ide baru untuk memberikan solusi mutakhir yang membuat klien kami selangkah lebih maju.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-handshake',
                'title' => 'Integritas',
                'description' => 'Kami menjalankan bisnis kami dengan standar etika tertinggi, membangun kepercayaan melalui transparansi dan kejujuran dalam semua interaksi kami.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-trophy',
                'title' => 'Keunggulan',
                'description' => 'Kami berkomitmen untuk memberikan kualitas luar biasa dalam segala hal yang kami lakukan, berjuang untuk kesempurnaan dalam setiap proyek dan layanan.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-users',
                'title' => 'Kolaborasi',
                'description' => 'Kami percaya pada kekuatan kerja sama tim, memupuk budaya di mana beragam perspektif bersatu untuk menciptakan solusi inovatif.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-heart',
                'title' => 'Fokus Pelanggan',
                'description' => 'Kesuksesan klien adalah kesuksesan kami. Kami bekerja ekstra untuk memahami dan memenuhi kebutuhan mereka, membangun kemitraan yang langgeng.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-rocket',
                'title' => 'Ketangkasan',
                'description' => 'Kami beradaptasi dengan cepat terhadap perubahan kondisi pasar dan kebutuhan klien, memastikan kami selalu memberikan solusi yang relevan dan tepat waktu.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($values as $value) {
            CompanyValue::updateOrCreate(['order' => $value['order']], $value);
        }

        $this->command->info('Company values seeded successfully!');
    }
}
