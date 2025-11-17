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
}
