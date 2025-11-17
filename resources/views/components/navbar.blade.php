<nav class="bg-white shadow-lg sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    @php
        $siteSetting = \App\Models\SiteSetting::getInstance();
        $contactInfo = \App\Models\ContactInfo::getInstance();
    @endphp
    
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Top Contact Bar -->
        <div class="border-b border-gray-200 py-2">
            <div class="flex flex-col sm:flex-row justify-between items-center text-gray-700 text-sm space-y-2 sm:space-y-0">
                <div class="flex items-center space-x-6">
                    @if($contactInfo->phone_1)
                    <a href="tel:{{ $contactInfo->phone_1 }}" class="flex items-center hover:text-[#71b346] transition">
                        <i class="fas fa-phone mr-2"></i>
                        {{ $contactInfo->phone_1 }}@if($contactInfo->phone_2), {{ $contactInfo->phone_2 }}@endif
                    </a>
                    @endif
                    @if($contactInfo->email)
                    <a href="mailto:{{ $contactInfo->email }}" class="hidden md:flex items-center hover:text-[#71b346] transition">
                        <i class="fas fa-envelope mr-2"></i>
                        {{ $contactInfo->email }}
                    </a>
                    @endif
                </div>
                <div class="flex items-center space-x-4">
                    @if($contactInfo->facebook_url)
                    <a href="{{ $contactInfo->facebook_url }}" target="_blank" class="hover:text-[#71b346] transition" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    @endif
                    @if($contactInfo->instagram_url)
                    <a href="{{ $contactInfo->instagram_url }}" target="_blank" class="hover:text-[#71b346] transition" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    @endif
                    @if($contactInfo->twitter_url)
                    <a href="{{ $contactInfo->twitter_url }}" target="_blank" class="hover:text-[#71b346] transition" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation with Solid Color -->
    <div class="bg-[#04726d]">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between py-4">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="p-2">
                    @if($siteSetting->logo)
                        <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="{{ $siteSetting->app_name }} Logo" class="h-12 w-auto">
                    @else
                        <img src="{{ asset('images/logo.png') }}" alt="{{ $siteSetting->app_name }} Logo" class="h-12 w-auto">
                    @endif
                </div>
                <div class="text-white">
                    <h1 class="text-xl font-bold">{{ $siteSetting->app_name }}</h1>
                    <p class="text-xs opacity-90">{{ $siteSetting->app_tagline }}</p>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-0.5 xl:space-x-1">
                <a href="#home" class="text-white font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent hover:border-white transition-colors text-sm xl:text-base">Home</a>
                <a href="#about" class="text-white font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent hover:border-white transition-colors text-sm xl:text-base">About</a>
                <a href="#news" class="text-white font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent hover:border-white transition-colors text-sm xl:text-base">News</a>
                <a href="#gallery" class="text-white font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent hover:border-white transition-colors text-sm xl:text-base">Gallery</a>
                <a href="#our-service" class="text-white font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent hover:border-white transition-colors text-sm xl:text-base">Our Service</a>
                <a href="#contact" class="text-white font-medium px-2 xl:px-4 py-2 border-b-2 border-transparent hover:border-white transition-colors text-sm xl:text-base">Contact Us</a>
                <button class="text-white p-2 hover:bg-white/10 rounded transition" aria-label="Search">
                    <i class="fas fa-search text-lg"></i>
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-white p-2">
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
                <a href="#home" class="text-white font-medium hover:bg-white/10 px-4 py-2 rounded transition">Home</a>
                <a href="#about" class="text-white font-medium hover:bg-white/10 px-4 py-2 rounded transition">About</a>
                <a href="#news" class="text-white font-medium hover:bg-white/10 px-4 py-2 rounded transition">News</a>
                <a href="#gallery" class="text-white font-medium hover:bg-white/10 px-4 py-2 rounded transition">Gallery</a>
                <a href="#our-service" class="text-white font-medium hover:bg-white/10 px-4 py-2 rounded transition">Our Service</a>
                <a href="#contact" class="text-white font-medium hover:bg-white/10 px-4 py-2 rounded transition">Contact Us</a>
            </div>
        </div>
    </div>
</nav>
