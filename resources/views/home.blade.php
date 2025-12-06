@extends('layouts.home')

@php
    $siteSetting = \App\Models\SiteSetting::getInstance();
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
    $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
@endphp

@section('content')
<x-navbar />

<!-- Hero Section -->
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden" x-data="{
    currentSlide: 0,
    slides: [
        @foreach($sliders as $slider)
        {
            image: '{{ str_starts_with($slider->image, 'http') ? $slider->image : asset('storage/' . $slider->image) }}',
            title: '{{ addslashes($slider->title) }}',
            subtitle: '{{ addslashes($slider->subtitle) }}',
            description: '{{ addslashes($slider->description) }}'
        }@if(!$loop->last),@endif
        @endforeach
    ],
    autoplay: null,
    init() { this.startAutoplay(); },
    startAutoplay() { this.autoplay = setInterval(() => { this.next(); }, 5000); },
    stopAutoplay() { if (this.autoplay) clearInterval(this.autoplay); },
    next() { this.currentSlide = (this.currentSlide + 1) % this.slides.length; },
    prev() { this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length; }
}">
    <!-- Slides Background -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="currentSlide === index"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 transform scale-105"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95"
             class="absolute inset-0 w-full h-full bg-cover bg-center"
             :style="`background-image: url('${slide.image}');`">
             <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/40"></div>
        </div>
    </template>

    <!-- Content -->
    <div class="container mx-auto px-4 relative z-10 text-center text-white h-full flex flex-col justify-center items-center" data-aos="fade-up">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index" class="max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight tracking-tight" x-text="slide.title"></h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 font-light" x-text="slide.subtitle"></p>
                <p class="text-lg mb-10 opacity-80 max-w-2xl mx-auto" x-text="slide.description"></p>
                <div class="flex flex-col md:flex-row gap-4 justify-center">
                    <a href="#about" class="text-white px-8 py-4 rounded-full font-bold transition transform hover:scale-105 shadow-lg border-2" style="background-color: {{ $secondaryColor }}; border-color: {{ $secondaryColor }};" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                        Explore Services
                    </a>
                    <a href="#contact" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-bold hover:bg-white transition transform hover:scale-105" style="color: white;" onmouseover="this.style.backgroundColor='white'; this.style.color='{{ $primaryColor }}'" onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'">
                        Contact Us
                    </a>
                </div>
            </div>
        </template>
    </div>

    <!-- Navigation Arrows -->
    <button @click="prev(); stopAutoplay(); startAutoplay();" class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 w-12 h-12 md:w-16 md:h-16 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all z-20 border border-white/20 group">
        <i class="fas fa-chevron-left text-xl group-hover:-translate-x-1 transition-transform"></i>
    </button>
    <button @click="next(); stopAutoplay(); startAutoplay();" class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 w-12 h-12 md:w-16 md:h-16 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white transition-all z-20 border border-white/20 group">
        <i class="fas fa-chevron-right text-xl group-hover:translate-x-1 transition-transform"></i>
    </button>
    
    <!-- Indicators -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex space-x-3 z-20">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index; stopAutoplay(); startAutoplay();" 
                    :class="currentSlide === index ? 'w-12' : 'w-3 bg-white/50 hover:bg-white'"
                    :style="currentSlide === index ? 'background-color: {{ $secondaryColor }}' : ''"
                    class="h-3 rounded-full transition-all duration-300"></button>
        </template>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white relative z-20 -mt-8 mx-4 md:mx-12 rounded-2xl shadow-xl border border-gray-100">
    <div class="grid grid-cols-2 md:grid-cols-{{ min(count($stats), 4) }} gap-8 text-center divide-x divide-gray-100">
        @foreach($stats as $stat)
        <div class="p-4">
            <div class="text-4xl font-bold mb-2" style="color: {{ $primaryColor }};">{{ $stat->value }}</div>
            <div class="text-gray-500 text-sm uppercase tracking-wide font-semibold">{{ $stat->label }}</div>
        </div>
        @endforeach
    </div>
</section>

<!-- Services Section -->
<section id="about" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="font-bold tracking-wider uppercase text-sm" style="color: {{ $secondaryColor }};">Our Expertise</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-6">Comprehensive Solutions</h2>
            <div class="w-24 h-1.5 mx-auto rounded-full" style="background: linear-gradient(to right, {{ $primaryColor }}, {{ $secondaryColor }});"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border-t-4 border-transparent" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}" onmouseover="this.style.borderColor='{{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}'" onmouseout="this.style.borderColor='transparent'">
                <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-colors duration-300" style="background-color: {{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}20;" onmouseover="this.style.backgroundColor='{{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}'" onmouseout="this.style.backgroundColor='{{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}20'">
                    <i class="fas {{ $service->icon }} text-3xl transition-colors" style="color: {{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }};" onmouseover="this.style.color='white'" onmouseout="this.style.color='{{ $loop->iteration % 2 == 0 ? $secondaryColor : $primaryColor }}'"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $service->title }}</h3>
                <p class="text-gray-600 leading-relaxed">{{ $service->short_description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full blur-3xl" style="background-color: {{ $secondaryColor }}10;"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full blur-3xl" style="background-color: {{ $primaryColor }}10;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="font-bold tracking-wider uppercase text-sm" style="color: {{ $primaryColor }};">Testimonials</span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2">What Our Clients Say</h2>
        </div>

        <!-- Testimonials Carousel -->
        <div class="relative">
            <!-- Scrollable Container -->
            <div class="overflow-hidden" id="testimonialCarousel">
                <div class="flex gap-6 transition-transform duration-700 ease-in-out" id="testimonialTrack">
                    @foreach($testimonials as $index => $testimonial)
                    <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3">
                        <div class="bg-gray-50 p-8 rounded-2xl relative h-full hover:shadow-xl transition-shadow">
                            <i class="fas fa-quote-right absolute top-8 right-8 text-4xl text-gray-200"></i>
                            <div class="flex items-center mb-6">
                                @if($testimonial->client_avatar)
                                    <img src="{{ $testimonial->client_avatar }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl font-bold text-white" style="background-color: {{ $primaryColor }};">
                                        {{ strtoupper(substr($testimonial->client_name, 0, 2)) }}
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <h4 class="font-bold text-gray-900">{{ $testimonial->client_name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $testimonial->client_position }}{{ $testimonial->client_company ? ', ' . $testimonial->client_company : '' }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic mb-4">"{{ $testimonial->testimonial }}"</p>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Indicators -->
            <div class="flex justify-center mt-8 gap-2" id="testimonialIndicators"></div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('testimonialTrack');
    const carousel = document.getElementById('testimonialCarousel');
    const indicators = document.getElementById('testimonialIndicators');
    
    const totalItems = {{ $testimonials->count() }};
    let currentIndex = 0;
    let itemsPerView = 3;
    let autoScrollInterval;
    
    // Update items per view based on screen size
    function updateItemsPerView() {
        if (window.innerWidth < 768) {
            itemsPerView = 1;
        } else if (window.innerWidth < 1024) {
            itemsPerView = 2;
        } else {
            itemsPerView = 3;
        }
        updateCarousel();
        createIndicators();
    }
    
    // Calculate total slides
    function getTotalSlides() {
        return Math.max(1, totalItems - itemsPerView + 1);
    }
    
    // Update carousel position
    function updateCarousel() {
        const slideWidth = 100 / itemsPerView;
        track.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
        updateIndicators();
    }
    
    // Create indicators
    function createIndicators() {
        indicators.innerHTML = '';
        const totalSlides = getTotalSlides();
        
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-3 h-3 rounded-full transition-all';
            dot.style.backgroundColor = i === currentIndex ? '{{ $primaryColor }}' : '#d1d5db';
            if (i === currentIndex) {
                dot.classList.add('w-8');
            }
            dot.addEventListener('click', () => goToSlide(i));
            indicators.appendChild(dot);
        }
    }
    
    // Update indicators
    function updateIndicators() {
        const dots = indicators.children;
        for (let i = 0; i < dots.length; i++) {
            if (i === currentIndex) {
                dots[i].style.backgroundColor = '{{ $primaryColor }}';
                dots[i].classList.add('w-8');
                dots[i].classList.remove('w-3');
            } else {
                dots[i].style.backgroundColor = '#d1d5db';
                dots[i].classList.remove('w-8');
                dots[i].classList.add('w-3');
            }
        }
    }
    
    // Go to specific slide
    function goToSlide(index) {
        currentIndex = index;
        updateCarousel();
    }
    
    // Next slide
    function next() {
        const totalSlides = getTotalSlides();
        currentIndex = (currentIndex + 1) % totalSlides;
        updateCarousel();
    }
    
    // Start auto scroll
    function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            next();
        }, 4000); // Auto scroll every 4 seconds
    }
    
    // Stop auto scroll
    function stopAutoScroll() {
        if (autoScrollInterval) {
            clearInterval(autoScrollInterval);
        }
    }
    
    // Initialize
    updateItemsPerView();
    startAutoScroll();
    
    // Pause on hover
    carousel.addEventListener('mouseenter', stopAutoScroll);
    carousel.addEventListener('mouseleave', startAutoScroll);
    
    // Update on resize
    window.addEventListener('resize', updateItemsPerView);
});
</script>

<!-- Footer -->
<x-footer />

<!-- Scroll to Top -->
<button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 opacity-0 pointer-events-none z-50 flex items-center justify-center transform hover:scale-110 group" style="background: linear-gradient(to bottom right, {{ $primaryColor }}, {{ $secondaryColor }});">
    <i class="fas fa-arrow-up group-hover:-translate-y-1 transition-transform"></i>
</button>
@endsection

@push('scripts')
<script>
    // Scroll to top functionality
    const scrollTopBtn = document.getElementById('scrollTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
        }
    });
    
    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
@endpush
