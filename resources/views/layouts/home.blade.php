<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $siteSetting = \App\Models\SiteSetting::getInstance();
        $primaryColor = $siteSetting->primary_color ?? '#04726d';
        $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $siteSetting->meta_description ?? '' }}">
    <meta name="keywords" content="{{ $siteSetting->meta_keywords ?? '' }}">
    <title>@yield('title', $siteSetting->app_name ?? 'Home') - {{ $siteSetting->app_tagline ?? '' }}</title>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <script src="https://cdn.tailwindcss.com"></script>
    @if($siteSetting->favicon)
        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $siteSetting->favicon) }}">
    @else
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- AOS - Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <style>
        :root {
            --primary-color: {{ $primaryColor }};
            --secondary-color: {{ $secondaryColor }};
        }
        
        html {
            scroll-behavior: smooth;
        }
        
        .hero-slider {
            position: relative;
            overflow: hidden;
        }
        
        .slide {
            display: none;
            animation: fadeIn 1s ease-in-out;
        }
        
        .slide.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .gradient-overlay {
            background: linear-gradient(135deg, {{ $primaryColor }}e6 0%, {{ $secondaryColor }}e6 100%);
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-50">
    @yield('content')
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });
    </script>
    
    @stack('scripts')
</body>
</html>
