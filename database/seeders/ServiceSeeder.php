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
                'title' => 'Parking Management',
                'slug' => 'parking-management',
                'short_description' => 'Professional parking management services with modern technology and trained personnel.',
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
                'meta_title' => 'Professional Parking Management Services',
                'meta_description' => 'Modern parking management solutions with QR technology and trained personnel',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-shield-alt',
                'title' => 'Security Services',
                'slug' => 'security-services',
                'short_description' => 'Certified security personnel providing 24/7 protection for your business premises.',
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
                'meta_title' => 'Professional Security Services - 24/7 Protection',
                'meta_description' => 'Certified security personnel for comprehensive business protection',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-broom',
                'title' => 'Cleaning Services',
                'slug' => 'cleaning-services',
                'short_description' => 'Professional cleaning services maintaining hygiene and cleanliness to the highest standards.',
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
                'meta_title' => 'Professional Cleaning Services',
                'meta_description' => 'Eco-friendly cleaning services for offices and commercial spaces',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-tools',
                'title' => 'Facility Maintenance',
                'slug' => 'facility-maintenance',
                'short_description' => 'Comprehensive facility maintenance services to keep your building in optimal condition.',
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
                'meta_title' => 'Facility Maintenance Services',
                'meta_description' => 'Comprehensive building maintenance and repair services',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-leaf',
                'title' => 'Landscaping Services',
                'slug' => 'landscaping-services',
                'short_description' => 'Professional landscaping and gardening services to enhance your property aesthetics.',
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
                'meta_title' => 'Professional Landscaping Services',
                'meta_description' => 'Expert landscaping and garden maintenance services',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-recycle',
                'title' => 'Waste Management',
                'slug' => 'waste-management',
                'short_description' => 'Eco-friendly waste management solutions for sustainable business operations.',
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
                'meta_title' => 'Eco-friendly Waste Management Services',
                'meta_description' => 'Sustainable waste management and recycling solutions',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $this->command->info('Services seeded successfully!');
    }
}
