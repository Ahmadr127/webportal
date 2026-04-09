<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'icon' => 'fa-car',
                'title' => 'Manajemen Parkir',
                'slug' => 'manajemen-parkir',
                'short_description' => 'Layanan manajemen parkir profesional dengan teknologi modern dan personel terlatih.',
                'full_description' => '<p>Our parking management service provides comprehensive solutions for your parking facility needs. We utilize cutting-edge technology including QR code systems, automated payment processing, and real-time monitoring.</p><p>Our trained staff ensures smooth operations, excellent customer service, and maximum efficiency in managing your parking facilities.</p>',
                'image' => 'https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=800&q=80',
                'features' => [
                    'QR Code Entry/Exit System',
                    'Automated Payment Processing',
                    'Real-time Monitoring',
                    '24/7 Customer Support',
                    'Monthly Reporting',
                    'Mobile App Integration'
                ],
                'meta_title' => 'Layanan Manajemen Parkir Profesional',
                'meta_description' => 'Solusi manajemen parkir modern dengan teknologi QR dan personel terlatih',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-shield-alt',
                'title' => 'Layanan Keamanan',
                'slug' => 'layanan-keamanan',
                'short_description' => 'Personel keamanan bersertifikat memberikan perlindungan 24/7 untuk lokasi bisnis Anda.',
                'full_description' => '<p>Our security services offer comprehensive protection for your business. We provide highly trained and certified security personnel who are equipped to handle various security situations.</p><p>From access control to emergency response, our team ensures the safety of your property, employees, and visitors around the clock.</p>',
                'image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=800&q=80',
                'features' => [
                    'Certified Security Personnel',
                    '24/7 Monitoring',
                    'Access Control Systems',
                    'Emergency Response',
                    'CCTV Integration',
                    'Regular Patrol Services'
                ],
                'meta_title' => 'Layanan Keamanan Profesional - Perlindungan 24/7',
                'meta_description' => 'Personel keamanan bersertifikat untuk perlindungan bisnis yang komprehensif',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-broom',
                'title' => 'Layanan Kebersihan',
                'slug' => 'layanan-kebersihan',
                'short_description' => 'Layanan kebersihan profesional yang menjaga higienitas dan kebersihan dengan standar tertinggi.',
                'full_description' => '<p>Our cleaning services ensure your facilities remain spotless and hygienic. We use eco-friendly cleaning products and follow strict protocols to maintain the highest standards of cleanliness.</p><p>Whether it\'s daily maintenance or deep cleaning, our experienced team delivers exceptional results every time.</p>',
                'image' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=800&q=80',
                'features' => [
                    'Daily Cleaning Services',
                    'Deep Cleaning',
                    'Eco-friendly Products',
                    'Trained Cleaning Staff',
                    'Flexible Scheduling',
                    'Quality Assurance Checks'
                ],
                'meta_title' => 'Layanan Kebersihan Profesional',
                'meta_description' => 'Layanan kebersihan ramah lingkungan untuk kantor dan ruang komersial',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-tools',
                'title' => 'Pemeliharaan Fasilitas',
                'slug' => 'pemeliharaan-fasilitas',
                'short_description' => 'Layanan pemeliharaan fasilitas komprehensif untuk menjaga bangunan Anda dalam kondisi optimal.',
                'full_description' => '<p>Our facility maintenance services cover all aspects of building upkeep. From preventive maintenance to emergency repairs, we ensure your facilities operate smoothly.</p><p>Our skilled technicians handle everything from HVAC systems to plumbing, electrical work, and general repairs.</p>',
                'image' => 'https://images.unsplash.com/photo-1581578949510-fa7315c4c350?w=800&q=80',
                'features' => [
                    'Preventive Maintenance',
                    'Emergency Repairs',
                    'HVAC Services',
                    'Electrical Work',
                    'Plumbing Services',
                    'General Repairs'
                ],
                'meta_title' => 'Layanan Pemeliharaan Fasilitas',
                'meta_description' => 'Layanan pemeliharaan dan perbaikan gedung yang komprehensif',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-leaf',
                'title' => 'Layanan Lansekap',
                'slug' => 'layanan-lansekap',
                'short_description' => 'Layanan lansekap dan pertamanan profesional untuk meningkatkan estetika properti Anda.',
                'full_description' => '<p>Transform your outdoor spaces with our professional landscaping services. We design, install, and maintain beautiful landscapes that enhance your property\'s curb appeal.</p><p>Our team of experienced landscapers ensures your gardens and outdoor areas remain lush and well-maintained year-round.</p>',
                'image' => 'https://images.unsplash.com/photo-1558904541-efa843a96f01?w=800&q=80',
                'features' => [
                    'Landscape Design',
                    'Garden Maintenance',
                    'Lawn Care',
                    'Tree Trimming',
                    'Irrigation Systems',
                    'Seasonal Planting'
                ],
                'meta_title' => 'Layanan Lansekap Profesional',
                'meta_description' => 'Layanan ahli lansekap dan pemeliharaan taman',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-recycle',
                'title' => 'Manajemen Sampah',
                'slug' => 'manajemen-sampah',
                'short_description' => 'Solusi manajemen limbah ramah lingkungan untuk operasi bisnis berkelanjutan.',
                'full_description' => '<p>Our waste management services help businesses maintain clean and sustainable operations. We provide comprehensive waste collection, recycling, and disposal services.</p><p>We are committed to environmental responsibility and help our clients achieve their sustainability goals through proper waste management practices.</p>',
                'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=800&q=80',
                'features' => [
                    'Regular Waste Collection',
                    'Recycling Programs',
                    'Hazardous Waste Disposal',
                    'Waste Segregation',
                    'Composting Services',
                    'Sustainability Reporting'
                ],
                'meta_title' => 'Layanan Manajemen Limbah Ramah Lingkungan',
                'meta_description' => 'Manajemen limbah berkelanjutan dan solusi daur ulang',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        $this->command->info('Services seeded successfully!');
    }
}
