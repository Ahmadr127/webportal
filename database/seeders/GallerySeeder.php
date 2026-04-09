<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryImage;
use App\Models\GalleryCategory;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officeCategory = GalleryCategory::where('slug', 'kantor')->first();
        $teamCategory = GalleryCategory::where('slug', 'tim')->first();
        $eventsCategory = GalleryCategory::where('slug', 'acara')->first();
        $projectsCategory = GalleryCategory::where('slug', 'proyek')->first();

        $images = [
            // Office Images
            [
                'title' => 'Ruang Kantor Modern',
                'description' => 'Lingkungan kantor kami yang modern dan nyaman',
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
                'category_id' => $officeCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Area Resepsionis',
                'description' => 'Area resepsionis yang ramah bagi pengunjung kami',
                'image' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&q=80',
                'category_id' => $officeCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Ruang Rapat',
                'description' => 'Fasilitas rapat yang canggih',
                'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=800&q=80',
                'category_id' => $officeCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
            
            // Team Images
            [
                'title' => 'Tim Profesional Kami',
                'description' => 'Anggota tim berdedikasi yang bekerja bersama',
                'image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80',
                'category_id' => $teamCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Tim Keamanan',
                'description' => 'Personel keamanan kami yang terlatih',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80',
                'category_id' => $teamCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Staf Kebersihan',
                'description' => 'Tim kebersihan profesional sedang bekerja',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',
                'category_id' => $teamCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
            
            // Events Images
            [
                'title' => 'Pertemuan Tahunan Perusahaan',
                'description' => 'Acara membangun tim dan perayaan',
                'image' => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=800&q=80',
                'category_id' => $eventsCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Lokakarya Pelatihan',
                'description' => 'Sesi pelatihan pengembangan profesional',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=800&q=80',
                'category_id' => $eventsCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Upacara Penghargaan',
                'description' => 'Merayakan keunggulan dan pencapaian',
                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=80',
                'category_id' => $eventsCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
            
            // Projects Images
            [
                'title' => 'Sistem Parkir Cerdas',
                'description' => 'Implementasi manajemen parkir berbasis QR',
                'image' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=800&q=80',
                'category_id' => $projectsCategory?->id,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Keamanan Kompleks Kantor',
                'description' => 'Pemasangan sistem keamanan komprehensif',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80',
                'category_id' => $projectsCategory?->id,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Proyek Pembersihan Mall',
                'description' => 'Layanan pembersihan komersial skala besar',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',
                'category_id' => $projectsCategory?->id,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($images as $image) {
            GalleryImage::updateOrCreate(['image' => $image['image']], $image);
        }

        $this->command->info('Gallery images seeded successfully!');
    }
}
