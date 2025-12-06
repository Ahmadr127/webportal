@extends('layouts.home')

@php
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
    $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
@endphp

@section('content')
<x-navbar />

<!-- About Sections (Dynamic from Database) -->
@foreach($aboutSections as $index => $section)
<section class="py-20 {{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            @if($loop->iteration % 2 == 0)
            <!-- Image on Right -->
            <div data-aos="fade-right">
                <span class="font-bold uppercase text-sm" style="color: {{ $secondaryColor }};">{{ $section->subtitle }}</span>
                <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-6">{{ $section->title }}</h2>
                <div class="text-gray-600 leading-relaxed prose max-w-none">
                    {!! $section->content !!}
                </div>
            </div>
            <div data-aos="fade-left">
                @if($section->image)
                    <img src="{{ str_starts_with($section->image, 'http') ? $section->image : asset('storage/' . $section->image) }}" alt="{{ $section->title }}" class="rounded-2xl shadow-2xl">
                @else
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80" alt="{{ $section->title }}" class="rounded-2xl shadow-2xl">
                @endif
            </div>
            @else
            <!-- Image on Left -->
            <div data-aos="fade-right">
                @if($section->image)
                    <img src="{{ str_starts_with($section->image, 'http') ? $section->image : asset('storage/' . $section->image) }}" alt="{{ $section->title }}" class="rounded-2xl shadow-2xl">
                @else
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80" alt="{{ $section->title }}" class="rounded-2xl shadow-2xl">
                @endif
            </div>
            <div data-aos="fade-left">
                <span class="font-bold uppercase text-sm" style="color: {{ $secondaryColor }};">{{ $section->subtitle }}</span>
                <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-6">{{ $section->title }}</h2>
                <div class="text-gray-600 leading-relaxed prose max-w-none">
                    {!! $section->content !!}
                </div>
                
                @if($loop->first && $stats->count() > 0)
                <!-- Stats Grid (only on first section) -->
                <div class="grid grid-cols-2 gap-4 mt-6">
                    @foreach($stats->take(4) as $stat)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-3xl font-bold" style="color: {{ $primaryColor }};">{{ $stat->value }}</div>
                        <div class="text-sm text-gray-600">{{ $stat->label }}</div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endif
        </div>
    </div>
</section>
@endforeach

<!-- Company Values (Dynamic from Database) -->
@if($companyValues->count() > 0)
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
            <div class="w-24 h-1 mx-auto" style="background-color: {{ $secondaryColor }};"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ min($companyValues->count(), 4) }} gap-6">
            @foreach($companyValues as $index => $value)
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: {{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}20;">
                    <i class="fas {{ $value->icon }} text-4xl" style="color: {{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }};"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">{{ $value->title }}</h4>
                <p class="text-sm text-gray-600">{{ $value->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<x-footer />

<!-- Scroll to Top -->
<button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 opacity-0 pointer-events-none z-50 flex items-center justify-center transform hover:scale-110 group" style="background: linear-gradient(to bottom right, {{ $primaryColor }}, {{ $secondaryColor }});">
    <i class="fas fa-arrow-up group-hover:-translate-y-1 transition-transform"></i>
</button>
@endsection

@push('scripts')
<script>
    const scrollTopBtn = document.getElementById('scrollTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
        }
    });
    
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
</script>
@endpush
