<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsTag;
use App\Models\User;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('username', 'admin')->first();
        
        if (!$admin) {
            $this->command->error('Admin user not found! Please run RolePermissionSeeder first.');
            return;
        }

        $companyNews = NewsCategory::where('slug', 'berita-perusahaan')->first();
        $industryInsights = NewsCategory::where('slug', 'wawasan-industri')->first();
        $productUpdates = NewsCategory::where('slug', 'pembaruan-produk')->first();

        $innovationTag = NewsTag::where('slug', 'inovasi')->first();
        $technologyTag = NewsTag::where('slug', 'teknologi')->first();
        $businessGrowthTag = NewsTag::where('slug', 'pertumbuhan-bisnis')->first();

        $news = [
            [
                'title' => 'Semesta Services Memperluas Operasi ke Kota-kota Baru',
                'slug' => 'semesta-services-memperluas-operasi-ke-kota-kota-baru',
                'excerpt' => 'Kami sangat bersemangat mengumumkan ekspansi kami ke tiga kota baru, membawa layanan manajemen fasilitas profesional kami ke lebih banyak bisnis.',
                'content' => '<p>We are thrilled to announce a significant milestone in our company\'s growth. Semesta Services is expanding its operations to three new cities: Surabaya, Bandung, and Medan.</p><p>This expansion reflects our commitment to providing world-class facility management services across Indonesia. Our new offices will offer the same high-quality parking management, security, and cleaning services that our clients have come to trust.</p><p>With this expansion, we aim to serve more businesses and contribute to the professional facility management industry in these regions.</p>',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1200&q=80',
                'category_id' => $companyNews?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Semesta Services Berekspansi ke Kota Baru',
                'meta_description' => 'Semesta Services mengumumkan ekspansi ke Surabaya, Bandung, dan Medan',
            ],
            [
                'title' => 'Masa Depan Teknologi Parkir Cerdas',
                'slug' => 'masa-depan-teknologi-parkir-cerdas',
                'excerpt' => 'Temukan bagaimana teknologi parkir cerdas merevolusi cara kami mengelola fasilitas parkir dan meningkatkan pengalaman pengguna.',
                'content' => '<p>Smart parking technology is transforming the parking industry. With innovations like QR code scanning, automated payment systems, and real-time availability tracking, parking has never been more convenient.</p><p>At Semesta Services, we have implemented cutting-edge smart parking solutions that reduce wait times, improve security, and enhance the overall user experience.</p><p>Our SCAN-TAP-GO system allows users to enter and exit parking facilities seamlessly, making parking management more efficient than ever before.</p>',
                'image' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=1200&q=80',
                'category_id' => $industryInsights?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'meta_title' => 'Teknologi Parkir Cerdas - Masa Depan Ada Di Sini',
                'meta_description' => 'Pelajari inovasi terbaru dalam teknologi parkir cerdas',
            ],
            [
                'title' => 'Aplikasi Seluler Baru untuk Manajemen Fasilitas',
                'slug' => 'aplikasi-seluler-baru-untuk-manajemen-fasilitas',
                'excerpt' => 'Memperkenalkan aplikasi seluler baru kami yang membuat manajemen fasilitas lebih mudah dan mudah diakses oleh klien kami.',
                'content' => '<p>We are proud to launch our new mobile application designed to streamline facility management for our clients.</p><p>The app provides real-time monitoring, instant notifications, service requests, and detailed reporting - all at your fingertips.</p><p>Available on both iOS and Android, our app ensures that you stay connected with your facility management team 24/7.</p>',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=1200&q=80',
                'category_id' => $productUpdates?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'meta_title' => 'Peluncuran Aplikasi Seluler Baru',
                'meta_description' => 'Unduh aplikasi seluler manajemen fasilitas baru kami',
            ],
            [
                'title' => 'Praktik Terbaik untuk Pembersihan Kantor Selama Pandemi',
                'slug' => 'praktik-terbaik-untuk-pembersihan-kantor-selama-pandemi',
                'excerpt' => 'Pelajari tentang protokol pembersihan ketat yang telah kami terapkan untuk memastikan lingkungan kerja yang aman dan higienis.',
                'content' => '<p>In response to the ongoing health concerns, we have enhanced our cleaning protocols to meet the highest hygiene standards.</p><p>Our team uses hospital-grade disinfectants, follows strict sanitization schedules, and focuses on high-touch areas to minimize the spread of germs.</p><p>We are committed to providing safe and clean environments for all our clients.</p>',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1200&q=80',
                'category_id' => $industryInsights?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'meta_title' => 'Praktik Terbaik Pembersihan Kantor',
                'meta_description' => 'Protokol pembersihan yang ditingkatkan untuk lingkungan kerja yang aman',
            ],
            [
                'title' => 'Semesta Services Memenangkan Penghargaan Manajemen Fasilitas Terbaik 2024',
                'slug' => 'semesta-services-memenangkan-penghargaan-manajemen-fasilitas-terbaik-2024',
                'excerpt' => 'Kami merasa terhormat menerima penghargaan Perusahaan Manajemen Fasilitas Terbaik atas layanan dan inovasi kami yang luar biasa.',
                'content' => '<p>We are incredibly proud to announce that Semesta Services has been awarded the Best Facility Management Company 2024 by the Indonesian Facility Management Association.</p><p>This recognition is a testament to our team\'s dedication, innovation, and commitment to excellence in serving our clients.</p><p>Thank you to all our clients and partners for your continued trust and support.</p>',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&q=80',
                'category_id' => $companyNews?->id,
                'author_id' => $admin->id,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'meta_title' => 'Semesta Services Memenangkan Penghargaan 2024',
                'meta_description' => 'Pemenang penghargaan Perusahaan Manajemen Fasilitas Terbaik',
            ],
        ];

        foreach ($news as $newsData) {
            $newsItem = News::updateOrCreate(['image' => $newsData['image']], $newsData);
            
            // Attach tags
            if ($innovationTag && $technologyTag && $businessGrowthTag) {
                $newsItem->tags()->attach([
                    $innovationTag->id,
                    $technologyTag->id,
                    $businessGrowthTag->id,
                ]);
            }
        }

        $this->command->info('News articles seeded successfully!');
    }
}
