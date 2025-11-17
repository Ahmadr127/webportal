@extends('layouts.home')

@section('content')
<!-- Navigation -->
<x-navbar />

<!-- Hero Section with Slider -->
<section id="home" class="hero-slider relative h-screen overflow-hidden" x-data="{
    currentSlide: 0,
    slides: [
        @foreach($sliders as $slider)
        {
            image: '{{ asset('storage/' . $slider->image) }}',
            title: '{{ addslashes($slider->title) }}',
            subtitle: '{{ addslashes($slider->subtitle) }}',
            description: '{{ addslashes($slider->description) }}'
        }@if(!$loop->last),@endif
        @endforeach
    ],
    autoplay: null,
    init() {
        this.startAutoplay();
    },
    startAutoplay() {
        this.autoplay = setInterval(() => {
            this.next();
        }, 5000);
    },
    stopAutoplay() {
        if (this.autoplay) {
            clearInterval(this.autoplay);
        }
    },
    next() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prev() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    },
    goToSlide(index) {
        this.currentSlide = index;
        this.stopAutoplay();
        this.startAutoplay();
    }
}">
    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div x-show="currentSlide === index"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full"
             :style="`background: url('${slide.image}') center/cover;`">
            <div class="container mx-auto px-6 md:px-12 lg:px-16 h-full flex items-center">
                <div class="max-w-3xl text-white">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight"
                        x-text="slide.title"></h1>
                    <p class="text-xl md:text-2xl mb-4 opacity-90"
                       x-text="slide.subtitle"></p>
                    <p class="text-lg mb-8 opacity-90"
                       x-text="slide.description"></p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#about" class="bg-white text-[#04726d] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Learn More</a>
                        <a href="#contact" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-[#04726d] transition">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Arrows -->
    <button @click="prev(); stopAutoplay(); startAutoplay();"
            class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition-all z-10">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button @click="next(); stopAutoplay(); startAutoplay();"
            class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition-all z-10">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- Slide Indicators -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="goToSlide(index)"
                    :class="currentSlide === index ? 'bg-white w-12' : 'bg-white/50 w-3'"
                    class="h-3 rounded-full transition-all duration-300 hover:bg-white/80"></button>
        </template>
    </div>
</section>

<!-- Welcome Section -->
<section id="about" class="py-20 bg-white scroll-mt-32" data-aos="fade-up" data-aos-duration="1000">
    <div class="container mx-auto px-6 md:px-12 lg:px-16">
        <!-- Header -->
        <div class="text-center mb-12" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Welcome to EZ Services</h2>
            <p class="text-base md:text-lg text-gray-800 max-w-5xl mx-auto leading-relaxed">
                Penyedia Jasa Pengelola Parkir, Jasa Keamanan Satpam & Jasa Cleaning Service terbaik yang bertumpu pada nilai keamanan, ekonomis, profesional, inovasi & kenyamanan jasa kami
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mt-16">
            <!-- Service 1 -->
            <div class="flex gap-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                <div class="flex-shrink-0">
                    <i class="fas fa-motorcycle text-4xl text-[#71b346]"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jasa Pengelola Parkir</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Pelayanan yang optimal kepada pengguna jasa parkir, merupakan pelaksanaan kegiatan sehari-hari yang harus dilakukan dengan baik, sehingga kepuasan pengguna jasa parkir dapat terukur.
                    </p>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="flex gap-6" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div class="flex-shrink-0">
                    <i class="fas fa-recycle text-4xl text-[#71b346]"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jasa Cleaning Services</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Elemen terpenting dalam setiap bangunan adalah kebersihan yang menjadi elemen utama dan dirasakan langsung oleh customer.
                    </p>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="flex gap-6" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="flex-shrink-0">
                    <i class="fas fa-shield-alt text-4xl text-[#71b346]"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Jasa Keamanan Satpam</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Keberadaan satuan pengamanan (Security), adalah dunia usaha itu tidak lagi hanya bertumpu pada tugas-tugas keamanan dan penjagaan aset gedung atau lainnya.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="our-service" class="py-20 relative scroll-mt-32" data-aos="fade-up" data-aos-duration="1000">
    <!-- Background with dark overlay -->
    <div class="absolute inset-0" style="background: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920') center/cover;"></div>
    <div class="absolute inset-0 bg-black/60"></div>
    
    <div class="container mx-auto px-6 md:px-12 lg:px-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Feature 1 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                <div class="flex justify-center mb-6">
                    <i class="fas fa-laptop text-4xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Professional Works</h3>
                <p class="text-white/90 leading-relaxed">
                    Untuk memberikan peningkatan pelayanan secara maksimal kepada pengunjung/customer merupakan added value bagi setiap gedung, baik dipusat perbelanjaan, perkantoran, rumah sakit, apartemen, dan lain-lain.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div class="flex justify-center mb-6">
                    <i class="fas fa-heart text-4xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Fast Delivery</h3>
                <p class="text-white/90 leading-relaxed">
                    Petugas kami melayani dengan ramah, respon yang cepat, dan tim yang support untuk bekerja 24/7 diseluruh wilayah.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="flex justify-center mb-6">
                    <i class="fas fa-bookmark text-4xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">PT. Anugerah Bina Karya</h3>
                <p class="text-white/90 leading-relaxed">
                    Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Removed contact section -->

<!-- Footer -->
<x-footer />

<!-- Scroll to Top Button -->
<button id="scrollTop" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-[#04726d] to-[#71b346] text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 pointer-events-none z-50">
    <i class="fas fa-arrow-up"></i>
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
