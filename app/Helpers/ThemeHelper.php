<?php

use App\Models\SiteSetting;

if (!function_exists('theme_color')) {
    /**
     * Get theme color from site settings
     *
     * @param string $type 'primary' or 'secondary'
     * @param string $opacity Optional opacity value (e.g., '10', '20', '50')
     * @return string
     */
    function theme_color($type = 'primary', $opacity = null)
    {
        $siteSetting = SiteSetting::getInstance();
        
        $color = $type === 'secondary' 
            ? ($siteSetting->secondary_color ?? '#71b346')
            : ($siteSetting->primary_color ?? '#04726d');
        
        if ($opacity !== null) {
            // Convert hex to RGB and add opacity
            $hex = str_replace('#', '', $color);
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            $alpha = intval($opacity) / 100;
            
            return "rgba($r, $g, $b, $alpha)";
        }
        
        return $color;
    }
}

if (!function_exists('theme_gradient')) {
    /**
     * Get gradient background style
     *
     * @param string $direction Default 'to right'
     * @return string
     */
    function theme_gradient($direction = 'to right')
    {
        return sprintf(
            'background: linear-gradient(%s, %s, %s);',
            $direction,
            theme_color('primary'),
            theme_color('secondary')
        );
    }
}
