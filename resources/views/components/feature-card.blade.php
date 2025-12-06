@php
    $siteSetting = \App\Models\SiteSetting::getInstance();
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
@endphp

<div class="feature-card bg-white/10 backdrop-blur-sm rounded-xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-300">
    <div class="flex justify-center mb-6">
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
            <i class="fas {{ $icon }} text-2xl" style="color: {{ $primaryColor }};"></i>
        </div>
    </div>
    <h3 class="text-xl font-bold text-white mb-4 text-center">{{ $title }}</h3>
    <p class="text-white/90 text-center leading-relaxed">{{ $description }}</p>
</div>
