<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $table = 'contact_info';

    protected $fillable = [
        'phone_1',
        'phone_2',
        'email',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'whatsapp',
    ];

    /**
     * Get the contact info instance (singleton pattern)
     */
    public static function getInstance()
    {
        return self::first() ?? self::create([
            'phone_1' => '021-26692269',
            'phone_2' => '021-22692977',
            'email' => 'contact@ezservices.co.id',
            'address' => 'Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230',
        ]);
    }
}
