@php
    $siteSetting = \App\Models\SiteSetting::getInstance();
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
    $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
@endphp

<div class="service-card bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 border-t-4 group hover:-translate-y-2" style="border-color: {{ $secondaryColor }};">
    <div class="flex justify-center mb-6">
        <div class="w-20 h-20 rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300" style="background: linear-gradient(to bottom right, {{ $secondaryColor }}, {{ $primaryColor }});">
            <i class="fas {{ $icon }} text-3xl text-white"></i>
        </div>
    </div>
    <h3 class="text-xl font-bold text-gray-800 mb-4 text-center">{{ $title }}</h3>
    <p class="text-gray-600 text-center leading-relaxed">{{ $description }}</p>
</div>
