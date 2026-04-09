<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Budi Santoso',
                'client_position' => 'Manajer Umum',
                'client_company' => 'PT Maju Jaya',
                'testimonial' => 'Semesta Services telah mengubah sistem manajemen parkir kami. Teknologi kode QR sangat lancar dan pelanggan kami menyukai kenyamanannya. Sangat direkomendasikan!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso&size=200&background=107BC1&color=fff',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'client_name' => 'Sarah Williams',
                'client_position' => 'Manajer Fasilitas',
                'client_company' => 'Global Tech Indonesia',
                'testimonial' => 'Layanan keamanan yang diberikan oleh Semesta Services sangatlah luar biasa. Personil mereka profesional, terlatih, dan selalu waspada. Kami merasa aman dan tentram.',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Sarah+Williams&size=200&background=34B1EF&color=fff',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'client_name' => 'Ahmad Hidayat',
                'client_position' => 'Direktur Operasi',
                'client_company' => 'Sentosa Mall',
                'testimonial' => 'Layanan kebersihan yang luar biasa! Mall kami tidak pernah terlihat lebih baik. Timnya sangat teliti, profesional, dan menggunakan produk ramah lingkungan. Kerja bagus!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Ahmad+Hidayat&size=200&background=107BC1&color=fff',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'client_name' => 'Linda Chen',
                'client_position' => 'Manajer Properti',
                'client_company' => 'Graha Perkasa',
                'testimonial' => 'Kami telah menggunakan Semesta Services selama lebih dari 3 tahun sekarang. Tim pemeliharaan fasilitas mereka responsif, terampil, dan selalu memberikan pekerjaan yang berkualitas. Sangat memuaskan!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Linda+Chen&size=200&background=34B1EF&color=fff',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'client_name' => 'Rudi Hartono',
                'client_position' => 'CEO',
                'client_company' => 'Nusantara Plaza',
                'testimonial' => 'Profesional, dapat diandalkan, dan efisien. Semesta Services telah menjadi mitra yang tak ternilai dalam mengelola properti komersial kami. Pendekatan terpadu mereka menghemat waktu dan uang kami.',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Rudi+Hartono&size=200&background=107BC1&color=fff',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'client_name' => 'Diana Putri',
                'client_position' => 'Manajer Gedung',
                'client_company' => 'Menara Sejahtera',
                'testimonial' => 'Layanan lansekap telah sepenuhnya mengubah eksterior gedung kami. Taman yang indah, halaman rumput yang terawat baik, dan layanan profesional. Sangat direkomendasikan!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Diana+Putri&size=200&background=34B1EF&color=fff',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(['client_name' => $testimonial['client_name']], $testimonial);
        }

        $this->command->info('Testimonials seeded successfully!');
    }
}
