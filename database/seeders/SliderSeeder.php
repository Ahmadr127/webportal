<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, clear existing sliders
        // Slider::truncate();
        
        $sliders = [
            [
                'title' => 'Parkir Cerdas & Layanan Fasilitas Terintegrasi',
                'subtitle' => 'SCAN - TAP - GO',
                'description' => 'Solusi terintegrasi untuk pengelolaan parkir, keamanan, dan kebersihan dengan teknologi modern.',
                'image' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=1920&q=80',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Layanan Keamanan Profesional',
                'subtitle' => 'Perlindungan 24/7',
                'description' => 'Personil keamanan terlatih dan bersertifikat untuk menjaga aset dan kenyamanan lingkungan bisnis Anda.',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Solusi Kebersihan Premium',
                'subtitle' => 'Bersih & Higienis',
                'description' => 'Layanan kebersihan profesional untuk gedung perkantoran, mall, dan area publik dengan standar higienis tinggi.',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1920&q=80',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(['order' => $slider['order']], $slider);
        }
    }
}