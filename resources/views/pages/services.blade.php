@extends('layouts.home')

@php
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
    $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
@endphp

@section('content')
<x-navbar />

<!-- Services Detail -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($services->count() > 0)
        @foreach($services as $index => $service)
        <div class="mb-16 last:mb-0">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                    <!-- Image Side -->
                    <div class="h-96 lg:h-auto {{ $index % 2 == 0 ? 'order-1' : 'order-2' }}">
                        @if($service->image)
                            <img src="{{ str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-cover">
                        @else
                            <img src="https://images.unsplash.com/photo-{{ $index == 0 ? '1590674899484-d5640e854abe' : ($index == 1 ? '1581578731548-c64695cc6952' : '1486406146926-c627a92ad1ab') }}?w=800&q=80" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-cover">
                        @endif
                    </div>
                    
                    <!-- Content Side -->
                    <div class="p-12 {{ $index % 2 == 0 ? 'order-2' : 'order-1' }} flex flex-col justify-center">
                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center mb-6" style="background-color: {{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}20;">
                            <i class="fas {{ $service->icon }} text-4xl" style="color: {{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }};"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $service->title }}</h2>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $service->short_description }}</p>
                        
                        @if($service->features && count($service->features) > 0)
                        <h4 class="font-bold text-gray-900 mb-4">Key Features:</h4>
                        <ul class="space-y-3 mb-8">
                            @foreach($service->features as $feature)
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle mr-3" style="color: {{ $secondaryColor }};"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        
                        <a href="{{ route('contact') }}" class="inline-flex items-center font-bold hover:transition-colors group" style="color: {{ $primaryColor }};" onmouseover="this.style.color='{{ $secondaryColor }}'" onmouseout="this.style.color='{{ $primaryColor }}';">
                            Request a Quote
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-2 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="text-center py-12">
            <i class="fas fa-concierge-bell text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada layanan tersedia.</p>
        </div>
        @endif
    </div>
</section>

<!-- Removed Why Choose Us -->

<!-- Removed CTA Section -->


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
