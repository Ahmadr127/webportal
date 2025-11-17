<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SNF - Jasa Pengelola Parkir, Jasa Keamanan dan Jasa Cleaning Service')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- AOS - Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <style>
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
            background: linear-gradient(135deg, rgba(4, 114, 109, 0.9) 0%, rgba(113, 179, 70, 0.9) 100%);
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
