<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default sliders if none exist
        if (Slider::count() == 0) {
            Slider::create([
                'image' => 'sliders/slider1.jpg',
                'title' => 'CASHLESS PARKING PAYMENT',
                'subtitle' => 'SCAN - TAP - GO',
                'description' => 'BAYAR PARKIR CEPAT & MUDAH',
                'button_text' => 'Learn More',
                'button_link' => '#',
                'order' => 0,
                'is_active' => true,
            ]);

            Slider::create([
                'image' => 'sliders/slider2.jpg',
                'title' => 'PROFESSIONAL CLEANING SERVICE',
                'subtitle' => 'Kebersihan adalah Prioritas',
                'description' => 'Layanan Kebersihan Terpercaya dan Berkualitas',
                'button_text' => 'Our Services',
                'button_link' => '#',
                'order' => 1,
                'is_active' => true,
            ]);

            Slider::create([
                'image' => 'sliders/slider3.jpg',
                'title' => 'SECURITY SERVICES',
                'subtitle' => 'Keamanan Terjamin 24/7',
                'description' => 'Pengamanan Profesional untuk Aset Anda',
                'button_text' => 'Contact Us',
                'button_link' => '#',
                'order' => 2,
                'is_active' => true,
            ]);
        }
    }
}