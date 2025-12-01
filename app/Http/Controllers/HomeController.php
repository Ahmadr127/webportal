<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\SiteSetting;
use App\Models\ContactInfo;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = [
            [
                'icon' => 'fa-motorcycle',
                'title' => 'Jasa Pengelola Parkir',
                'description' => 'Pelayanan yang optimal kepada pengguna jasa parkir, merupakan pelaksanaan kegiatan sehari-hari yang harus dilakukan dengan baik, sehingga kepuasan pengguna jasa parkir dapat terukur.'
            ],
            [
                'icon' => 'fa-recycle',
                'title' => 'Jasa Cleaning Services',
                'description' => 'Elemen terpenting dalam setiap bangunan adalah kebersihan yang menjadi elemen utama dan dirasakan langsung oleh customer.'
            ],
            [
                'icon' => 'fa-shield-alt',
                'title' => 'Jasa Keamanan Satpam',
                'description' => 'Keberadaan satuan pengamanan (Security), adalah dunia usaha itu tidak lagi hanya bertumpu pada tugas-tugas keamanan dan penjagaan aset gedung atau lainnya.'
            ]
        ];

        $features = [
            [
                'icon' => 'fa-laptop',
                'title' => 'Professional Works',
                'description' => 'Untuk memberikan peningkatan pelayanan secara maksimal kepada pengunjung/customer merupakan added value bagi setiap gedung, baik dipusat perbelanjaan, perkantoran, rumah sakit, apartemen, dan lain-lain.'
            ],
            [
                'icon' => 'fa-heart',
                'title' => 'Fast Delivery',
                'description' => 'Petugas kami melayani dengan ramah, respon yang cepat, dan tim yang support untuk bekerja 24/7 diseluruh wilayah.'
            ],
            [
                'icon' => 'fa-bookmark',
                'title' => 'PT. Anugerah Bina Karya',
                'description' => 'Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230'
            ]
        ];

        // Get dynamic data from database
        $sliders = Slider::active()->ordered()->get();
        $siteSetting = SiteSetting::getInstance();
        $contactInfo = ContactInfo::getInstance();

        return view('home', compact('services', 'features', 'sliders', 'siteSetting', 'contactInfo'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the news page.
     */
    public function news()
    {
        // In the future, fetch news from database
        $newsItems = [
            [
                'title' => 'Ekspansi Layanan ke Jakarta Selatan',
                'date' => '2024-11-15',
                'excerpt' => 'EZ Services memperluas jangkauan layanan dengan membuka cabang baru di area Jakarta Selatan untuk melayani lebih banyak klien.',
                'image' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800&q=80'
            ],
            [
                'title' => 'Sertifikasi ISO 9001:2015',
                'date' => '2024-10-20',
                'excerpt' => 'Kami dengan bangga mengumumkan bahwa perusahaan telah mendapatkan sertifikasi ISO 9001:2015 untuk standar manajemen mutu.',
                'image' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=800&q=80'
            ],
            [
                'title' => 'Partnership dengan Mall Terbesar',
                'date' => '2024-09-10',
                'excerpt' => 'Kerjasama strategis dengan salah satu mall terbesar di Jakarta untuk pengelolaan parkir dan keamanan.',
                'image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&q=80'
            ],
        ];
        
        return view('pages.news', compact('newsItems'));
    }

    /**
     * Display the gallery page.
     */
    public function gallery()
    {
        $galleryImages = [
            ['url' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=800&q=80', 'title' => 'Parking Management'],
            ['url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80', 'title' => 'Security Services'],
            ['url' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80', 'title' => 'Cleaning Services'],
            ['url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80', 'title' => 'Office Building'],
            ['url' => 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=800&q=80', 'title' => 'Modern Facilities'],
            ['url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80', 'title' => 'Professional Team'],
        ];
        
        return view('pages.gallery', compact('galleryImages'));
    }

    /**
     * Display the services page.
     */
    public function services()
    {
        $services = [
            [
                'icon' => 'fa-parking',
                'title' => 'Parking Management',
                'description' => 'Sistem pengelolaan parkir modern dengan teknologi cashless dan monitoring realtime untuk efisiensi maksimal.',
                'features' => ['Cashless Payment', 'Real-time Monitoring', '24/7 Support', 'Professional Staff']
            ],
            [
                'icon' => 'fa-broom',
                'title' => 'Cleaning Service',
                'description' => 'Layanan kebersihan profesional untuk gedung perkantoran, mall, dan area publik dengan standar higienis tinggi.',
                'features' => ['Daily Cleaning', 'Deep Cleaning', 'Eco-Friendly Products', 'Trained Personnel']
            ],
            [
                'icon' => 'fa-shield-alt',
                'title' => 'Security Guard',
                'description' => 'Personil keamanan terlatih dan bersertifikat untuk menjaga aset dan kenyamanan lingkungan bisnis Anda.',
                'features' => ['Certified Guards', 'CCTV Monitoring', 'Access Control', 'Emergency Response']
            ],
        ];
        
        return view('pages.services', compact('services'));
    }

    /**
     * Display the contact page.
     */
    public function contact()
    {
        $contactInfo = ContactInfo::getInstance();
        return view('pages.contact', compact('contactInfo'));
    }
}
