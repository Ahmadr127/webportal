<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'app_name',
        'app_tagline',
        'logo',
        'favicon',
        'primary_color',
        'secondary_color',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * Get the site settings instance (singleton pattern)
     */
    public static function getInstance()
    {
        return self::first() ?? self::create([
            'app_name' => 'EZ Services',
            'app_tagline' => 'Jasa Pengelola Parkir, Jasa Keamanan dan Jasa Cleaning Service',
            'primary_color' => '#04726d',
            'secondary_color' => '#71b346',
        ]);
    }
}
