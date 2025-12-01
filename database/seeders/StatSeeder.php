<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stat;

class StatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stats = [
            [
                'key' => 'years_experience',
                'label' => 'Years of Experience',
                'value' => '10+',
                'icon' => 'fa-calendar-check',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'key' => 'happy_clients',
                'label' => 'Happy Clients',
                'value' => '500+',
                'icon' => 'fa-smile',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'key' => 'projects_completed',
                'label' => 'Projects Completed',
                'value' => '1,000+',
                'icon' => 'fa-check-circle',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'key' => 'team_members',
                'label' => 'Team Members',
                'value' => '50+',
                'icon' => 'fa-users',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'key' => 'awards_won',
                'label' => 'Awards Won',
                'value' => '25+',
                'icon' => 'fa-trophy',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'key' => 'countries_served',
                'label' => 'Countries Served',
                'value' => '15+',
                'icon' => 'fa-globe',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($stats as $stat) {
            Stat::create($stat);
        }

        $this->command->info('Stats seeded successfully!');
    }
}
