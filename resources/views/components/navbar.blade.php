<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    @php
        $siteSetting = \App\Models\SiteSetting::getInstance();
        $contactInfo = \App\Models\ContactInfo::getInstance();
        $primaryColor = $siteSetting->primary_color ?? '#04726d';
        $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
    @endphp
    
    <!-- Top Contact Bar -->
    <div class="py-2" style="background-color: {{ $primaryColor }};">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center text-white text-sm space-y-2 sm:space-y-0">
                <div class="flex items-center space-x-6">
                    @if($contactInfo->phone_1)
                    <a href="tel:{{ $contactInfo->phone_1 }}" class="flex items-center text-white hover:text-white/80 transition">
                        <i class="fas fa-phone mr-2"></i>
                        {{ $contactInfo->phone_1 }}@if($contactInfo->phone_2), {{ $contactInfo->phone_2 }}@endif
                    </a>
                    @endif
                    @if($contactInfo->email)
                    <a href="mailto:{{ $contactInfo->email }}" class="hidden md:flex items-center text-white hover:text-white/80 transition">
                        <i class="fas fa-envelope mr-2"></i>
                        {{ $contactInfo->email }}
                    </a>
                    @endif
                </div>
                <div class="flex items-center space-x-4">
                    @if($contactInfo->facebook_url)
                    <a href="{{ $contactInfo->facebook_url }}" target="_blank" class="text-white hover:text-white/80 transition" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if($contactInfo->instagram_url)
                    <a href="{{ $contactInfo->instagram_url }}" target="_blank" class="text-white hover:text-white/80 transition" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if($contactInfo->twitter_url)
                    <a href="{{ $contactInfo->twitter_url }}" target="_blank" class="text-white hover:text-white/80 transition" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation with White Background -->
    <div class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="hover:opacity-80 transition-opacity">
                @if($siteSetting->logo)
                    <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="{{ $siteSetting->app_name }} Logo" class="h-12 w-auto">
                @else
                    <img src="{{ asset('images/logo.png') }}" alt="{{ $siteSetting->app_name }} Logo" class="h-12 w-auto">
                @endif
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-0.5 xl:space-x-1">
                <a href="{{ route('home') }}" class="font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent transition-colors text-sm xl:text-base {{ request()->routeIs('home') ? 'border-b-2' : '' }}" style="color: {{ request()->routeIs('home') ? $primaryColor : '#374151' }}; border-color: {{ request()->routeIs('home') ? $primaryColor : 'transparent' }};" onmouseover="this.style.borderColor='{{ $primaryColor }}'" onmouseout="this.style.borderColor='{{ request()->routeIs('home') ? $primaryColor : 'transparent' }}';">Home</a>
                <a href="{{ route('about') }}" class="font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent transition-colors text-sm xl:text-base {{ request()->routeIs('about') ? 'border-b-2' : '' }}" style="color: {{ request()->routeIs('about') ? $primaryColor : '#374151' }}; border-color: {{ request()->routeIs('about') ? $primaryColor : 'transparent' }};" onmouseover="this.style.borderColor='{{ $primaryColor }}'" onmouseout="this.style.borderColor='{{ request()->routeIs('about') ? $primaryColor : 'transparent' }}';">About</a>
                <a href="{{ route('news') }}" class="font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent transition-colors text-sm xl:text-base {{ request()->routeIs('news') ? 'border-b-2' : '' }}" style="color: {{ request()->routeIs('news') ? $primaryColor : '#374151' }}; border-color: {{ request()->routeIs('news') ? $primaryColor : 'transparent' }};" onmouseover="this.style.borderColor='{{ $primaryColor }}'" onmouseout="this.style.borderColor='{{ request()->routeIs('news') ? $primaryColor : 'transparent' }}';">News</a>
                <a href="{{ route('gallery') }}" class="font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent transition-colors text-sm xl:text-base {{ request()->routeIs('gallery') ? 'border-b-2' : '' }}" style="color: {{ request()->routeIs('gallery') ? $primaryColor : '#374151' }}; border-color: {{ request()->routeIs('gallery') ? $primaryColor : 'transparent' }};" onmouseover="this.style.borderColor='{{ $primaryColor }}'" onmouseout="this.style.borderColor='{{ request()->routeIs('gallery') ? $primaryColor : 'transparent' }}';">Gallery</a>
                <a href="{{ route('services') }}" class="font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent transition-colors text-sm xl:text-base {{ request()->routeIs('services') ? 'border-b-2' : '' }}" style="color: {{ request()->routeIs('services') ? $primaryColor : '#374151' }}; border-color: {{ request()->routeIs('services') ? $primaryColor : 'transparent' }};" onmouseover="this.style.borderColor='{{ $primaryColor }}'" onmouseout="this.style.borderColor='{{ request()->routeIs('services') ? $primaryColor : 'transparent' }}';">Our Service</a>
                <a href="{{ route('contact') }}" class="font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent transition-colors text-sm xl:text-base {{ request()->routeIs('contact') ? 'border-b-2' : '' }}" style="color: {{ request()->routeIs('contact') ? $primaryColor : '#374151' }}; border-color: {{ request()->routeIs('contact') ? $primaryColor : 'transparent' }};" onmouseover="this.style.borderColor='{{ $primaryColor }}'" onmouseout="this.style.borderColor='{{ request()->routeIs('contact') ? $primaryColor : 'transparent' }}';">Contact Us</a>
                <button class="p-2 rounded transition" style="color: #374151;" onmouseover="this.style.backgroundColor='#f3f4f6'" onmouseout="this.style.backgroundColor='transparent'" aria-label="Search">
                    <i class="fas fa-search text-lg"></i>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2" style="color: {{ $primaryColor }};">
                <i class="fas fa-bars text-2xl" x-show="!mobileMenuOpen"></i>
                <i class="fas fa-times text-2xl" x-show="mobileMenuOpen"></i>
            </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="container mx-auto px-4 lg:px-8 lg:hidden pb-4">
            <div class="flex flex-col space-y-2">
                <a href="{{ route('home') }}" class="font-medium px-4 py-2 rounded transition {{ request()->routeIs('home') ? '' : '' }}" style="color: {{ request()->routeIs('home') ? $primaryColor : '#374151' }}; background-color: {{ request()->routeIs('home') ? $primaryColor.'20' : 'transparent' }};" onmouseover="this.style.backgroundColor='{{ $primaryColor }}20'" onmouseout="this.style.backgroundColor='{{ request()->routeIs('home') ? $primaryColor.'20' : 'transparent' }}'">Home</a>
                <a href="{{ route('about') }}" class="font-medium px-4 py-2 rounded transition {{ request()->routeIs('about') ? '' : '' }}" style="color: {{ request()->routeIs('about') ? $primaryColor : '#374151' }}; background-color: {{ request()->routeIs('about') ? $primaryColor.'20' : 'transparent' }};" onmouseover="this.style.backgroundColor='{{ $primaryColor }}20'" onmouseout="this.style.backgroundColor='{{ request()->routeIs('about') ? $primaryColor.'20' : 'transparent' }}'">About</a>
                <a href="{{ route('news') }}" class="font-medium px-4 py-2 rounded transition {{ request()->routeIs('news') ? '' : '' }}" style="color: {{ request()->routeIs('news') ? $primaryColor : '#374151' }}; background-color: {{ request()->routeIs('news') ? $primaryColor.'20' : 'transparent' }};" onmouseover="this.style.backgroundColor='{{ $primaryColor }}20'" onmouseout="this.style.backgroundColor='{{ request()->routeIs('news') ? $primaryColor.'20' : 'transparent' }}'">News</a>
                <a href="{{ route('gallery') }}" class="font-medium px-4 py-2 rounded transition {{ request()->routeIs('gallery') ? '' : '' }}" style="color: {{ request()->routeIs('gallery') ? $primaryColor : '#374151' }}; background-color: {{ request()->routeIs('gallery') ? $primaryColor.'20' : 'transparent' }};" onmouseover="this.style.backgroundColor='{{ $primaryColor }}20'" onmouseout="this.style.backgroundColor='{{ request()->routeIs('gallery') ? $primaryColor.'20' : 'transparent' }}'">Gallery</a>
                <a href="{{ route('services') }}" class="font-medium px-4 py-2 rounded transition {{ request()->routeIs('services') ? '' : '' }}" style="color: {{ request()->routeIs('services') ? $primaryColor : '#374151' }}; background-color: {{ request()->routeIs('services') ? $primaryColor.'20' : 'transparent' }};" onmouseover="this.style.backgroundColor='{{ $primaryColor }}20'" onmouseout="this.style.backgroundColor='{{ request()->routeIs('services') ? $primaryColor.'20' : 'transparent' }}'">Our Service</a>
                <a href="{{ route('contact') }}" class="font-medium px-4 py-2 rounded transition {{ request()->routeIs('contact') ? '' : '' }}" style="color: {{ request()->routeIs('contact') ? $primaryColor : '#374151' }}; background-color: {{ request()->routeIs('contact') ? $primaryColor.'20' : 'transparent' }};" onmouseover="this.style.backgroundColor='{{ $primaryColor }}20'" onmouseout="this.style.backgroundColor='{{ request()->routeIs('contact') ? $primaryColor.'20' : 'transparent' }}'">Contact Us</a>
            </div>
        </div>
    </div>
</nav>
