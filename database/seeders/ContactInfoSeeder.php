<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::updateOrCreate(
            ['id' => 1],
            [
                'address' => 'Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230',
                'phone_1' => '021-26692269',
                'phone_2' => '021-22692977',
                'email' => 'contact@ezservices.co.id',
                'whatsapp' => '6281234567890',
                'facebook_url' => 'https://facebook.com/ezservices',
                'instagram_url' => 'https://instagram.com/ezservices',
                'twitter_url' => 'https://twitter.com/ezservices',
            ]
        );
    }
}
