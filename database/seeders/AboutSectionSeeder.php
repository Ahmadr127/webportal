<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'who_we_are',
                'title' => 'Who We Are',
                'content' => 'We are a leading technology company dedicated to providing innovative solutions that help businesses grow and succeed in the digital age. With over 10 years of experience, we have helped hundreds of companies transform their operations and achieve their goals.',
                'image' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'section_key' => 'our_mission',
                'title' => 'Our Mission',
                'content' => 'Our mission is to empower businesses with cutting-edge technology solutions that drive growth, efficiency, and innovation. We strive to be the trusted partner for companies looking to navigate the complexities of digital transformation.',
                'image' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'section_key' => 'our_vision',
                'title' => 'Our Vision',
                'content' => 'To be the global leader in providing innovative technology solutions that transform businesses and improve lives. We envision a future where technology seamlessly integrates with business operations to create unprecedented value.',
                'image' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'section_key' => 'our_approach',
                'title' => 'Our Approach',
                'content' => 'We believe in a collaborative approach that puts our clients at the center of everything we do. Our team works closely with you to understand your unique challenges and develop customized solutions that deliver real results.',
                'image' => null,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($sections as $section) {
            AboutSection::create($section);
        }

        $this->command->info('About sections seeded successfully!');
    }
}
