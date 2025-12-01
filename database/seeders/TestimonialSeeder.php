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
                'client_position' => 'General Manager',
                'client_company' => 'PT Maju Jaya',
                'testimonial' => 'EZ Services has transformed our parking management system. The QR code technology is seamless and our customers love the convenience. Highly recommended!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Budi+Santoso&size=200&background=04726d&color=fff',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'client_name' => 'Sarah Williams',
                'client_position' => 'Facility Manager',
                'client_company' => 'Global Tech Indonesia',
                'testimonial' => 'The security services provided by EZ Services are top-notch. Their personnel are professional, well-trained, and always vigilant. We feel safe and secure.',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Sarah+Williams&size=200&background=71b346&color=fff',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'client_name' => 'Ahmad Hidayat',
                'client_position' => 'Operations Director',
                'client_company' => 'Sentosa Mall',
                'testimonial' => 'Outstanding cleaning services! Our mall has never looked better. The team is thorough, professional, and uses eco-friendly products. Excellent work!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Ahmad+Hidayat&size=200&background=04726d&color=fff',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'client_name' => 'Linda Chen',
                'client_position' => 'Property Manager',
                'client_company' => 'Graha Perkasa',
                'testimonial' => 'We have been using EZ Services for over 3 years now. Their facility maintenance team is responsive, skilled, and always delivers quality work. Very satisfied!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Linda+Chen&size=200&background=71b346&color=fff',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'client_name' => 'Rudi Hartono',
                'client_position' => 'CEO',
                'client_company' => 'Nusantara Plaza',
                'testimonial' => 'Professional, reliable, and efficient. EZ Services has been an invaluable partner in managing our commercial property. Their integrated approach saves us time and money.',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Rudi+Hartono&size=200&background=04726d&color=fff',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'client_name' => 'Diana Putri',
                'client_position' => 'Building Manager',
                'client_company' => 'Menara Sejahtera',
                'testimonial' => 'The landscaping services have completely transformed our building exterior. Beautiful gardens, well-maintained lawns, and professional service. Highly recommended!',
                'rating' => 5,
                'client_avatar' => 'https://ui-avatars.com/api/?name=Diana+Putri&size=200&background=71b346&color=fff',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        $this->command->info('Testimonials seeded successfully!');
    }
}
