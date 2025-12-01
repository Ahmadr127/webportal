@extends('layouts.home')

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
                    <a href="#about" class="bg-[#71b346] text-white px-8 py-4 rounded-full font-bold hover:bg-[#5a9136] transition transform hover:scale-105 shadow-lg border-2 border-[#71b346]">
                        Explore Services
                    </a>
                    <a href="#contact" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-bold hover:bg-white hover:text-[#04726d] transition transform hover:scale-105">
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
                    :class="currentSlide === index ? 'w-12 bg-[#71b346]' : 'w-3 bg-white/50 hover:bg-white'"
                    class="h-3 rounded-full transition-all duration-300"></button>
        </template>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-white relative z-20 -mt-8 mx-4 md:mx-12 rounded-2xl shadow-xl border border-gray-100">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-gray-100">
        <div class="p-4">
            <div class="text-4xl font-bold text-[#04726d] mb-2 counter" data-target="10">0</div>
            <div class="text-gray-500 text-sm uppercase tracking-wide font-semibold">Years Experience</div>
        </div>
        <div class="p-4">
            <div class="text-4xl font-bold text-[#04726d] mb-2 counter" data-target="50">0</div>
            <div class="text-gray-500 text-sm uppercase tracking-wide font-semibold">Trusted Clients</div>
        </div>
        <div class="p-4">
            <div class="text-4xl font-bold text-[#04726d] mb-2">24/7</div>
            <div class="text-gray-500 text-sm uppercase tracking-wide font-semibold">Support Available</div>
        </div>
        <div class="p-4">
            <div class="text-4xl font-bold text-[#04726d] mb-2">100%</div>
            <div class="text-gray-500 text-sm uppercase tracking-wide font-semibold">Satisfaction</div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="about" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-20" data-aos="fade-up">
            <span class="text-[#71b346] font-bold tracking-wider uppercase text-sm">Our Expertise</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2 mb-6">Comprehensive Solutions</h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-[#04726d] to-[#71b346] mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border-t-4 border-transparent hover:border-[#04726d]" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-[#04726d]/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-[#04726d] transition-colors duration-300">
                    <i class="fas fa-parking text-3xl text-[#04726d] group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Parking Management</h3>
                <p class="text-gray-600 leading-relaxed">Sistem pengelolaan parkir modern dengan teknologi cashless dan monitoring realtime untuk efisiensi maksimal.</p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border-t-4 border-transparent hover:border-[#71b346]" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-[#71b346]/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-[#71b346] transition-colors duration-300">
                    <i class="fas fa-broom text-3xl text-[#71b346] group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Cleaning Service</h3>
                <p class="text-gray-600 leading-relaxed">Layanan kebersihan profesional untuk gedung perkantoran, mall, dan area publik dengan standar higienis tinggi.</p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group border-t-4 border-transparent hover:border-[#04726d]" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-[#04726d]/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-[#04726d] transition-colors duration-300">
                    <i class="fas fa-shield-alt text-3xl text-[#04726d] group-hover:text-white transition-colors"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Security Guard</h3>
                <p class="text-gray-600 leading-relaxed">Personil keamanan terlatih dan bersertifikat untuk menjaga aset dan kenyamanan lingkungan bisnis Anda.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section (New Feature) -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-[#71b346]/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-[#04726d]/5 rounded-full blur-3xl"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-[#04726d] font-bold tracking-wider uppercase text-sm">Testimonials</span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2">What Our Clients Say</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-gray-50 p-8 rounded-2xl relative" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-quote-right absolute top-8 right-8 text-4xl text-gray-200"></i>
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-xl font-bold text-white">JD</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">John Doe</h4>
                        <p class="text-sm text-gray-500">Building Manager</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Pelayanan yang sangat profesional. Tim security sangat sigap dan ramah. Sistem parkir juga berjalan lancar tanpa kendala."</p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-gray-50 p-8 rounded-2xl relative" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-quote-right absolute top-8 right-8 text-4xl text-gray-200"></i>
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-xl font-bold text-white">AS</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Anita Sari</h4>
                        <p class="text-sm text-gray-500">HR Director</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Cleaning service nya luar biasa detail. Kantor kami selalu bersih dan wangi. Sangat merekomendasikan EZ Services."</p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
            </div>

             <!-- Testimonial 3 -->
            <div class="bg-gray-50 p-8 rounded-2xl relative" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-quote-right absolute top-8 right-8 text-4xl text-gray-200"></i>
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-xl font-bold text-white">BP</div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-900">Budi Pratama</h4>
                        <p class="text-sm text-gray-500">Property Owner</p>
                    </div>
                </div>
                <p class="text-gray-600 italic">"Kerjasama yang baik sudah berjalan 3 tahun. Manajemen sangat responsif terhadap masukan. Sukses terus!"</p>
                <div class="flex text-yellow-400 mt-4">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-[#04726d] relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap Meningkatkan Kualitas Fasilitas Anda?</h2>
        <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto">Hubungi kami hari ini untuk konsultasi gratis dan penawaran khusus sesuai kebutuhan properti Anda.</p>
        <a href="#contact" class="inline-block bg-white text-[#04726d] px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl">
            Hubungi Kami Sekarang
        </a>
    </div>
</section>

<!-- Footer -->
<x-footer />

<!-- Scroll to Top -->
<button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-br from-[#04726d] to-[#71b346] text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 opacity-0 pointer-events-none z-50 flex items-center justify-center transform hover:scale-110 group">
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
