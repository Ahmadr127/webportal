<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyValue;

class CompanyValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'icon' => 'fa-lightbulb',
                'title' => 'Innovation',
                'description' => 'We constantly push boundaries and embrace new ideas to deliver cutting-edge solutions that keep our clients ahead of the curve.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-handshake',
                'title' => 'Integrity',
                'description' => 'We conduct our business with the highest ethical standards, building trust through transparency and honesty in all our interactions.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-trophy',
                'title' => 'Excellence',
                'description' => 'We are committed to delivering exceptional quality in everything we do, striving for perfection in every project and service.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-users',
                'title' => 'Collaboration',
                'description' => 'We believe in the power of teamwork, fostering a culture where diverse perspectives come together to create innovative solutions.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-heart',
                'title' => 'Customer Focus',
                'description' => 'Our clients success is our success. We go above and beyond to understand and meet their needs, building lasting partnerships.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'icon' => 'fa-rocket',
                'title' => 'Agility',
                'description' => 'We adapt quickly to changing market conditions and client needs, ensuring we always deliver relevant and timely solutions.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($values as $value) {
            CompanyValue::create($value);
        }

        $this->command->info('Company values seeded successfully!');
    }
}
