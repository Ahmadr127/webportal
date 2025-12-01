@extends('layouts.home')

@section('content')
<x-navbar />

<!-- Page Header -->
<section class="relative bg-gradient-to-r from-[#04726d] to-[#71b346] py-24">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4" data-aos="fade-up">Our Services</h1>
        <p class="text-xl opacity-90" data-aos="fade-up" data-aos-delay="100">Solusi Lengkap untuk Kebutuhan Fasilitas Anda</p>
    </div>
</section>

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
                        <div class="w-20 h-20 bg-[{{ $loop->iteration % 2 == 0 ? '#71b346' : '#04726d' }}]/10 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas {{ $service->icon }} text-4xl text-[{{ $loop->iteration % 2 == 0 ? '#71b346' : '#04726d' }}]"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $service->title }}</h2>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $service->short_description }}</p>
                        
                        @if($service->features && count($service->features) > 0)
                        <h4 class="font-bold text-gray-900 mb-4">Key Features:</h4>
                        <ul class="space-y-3 mb-8">
                            @foreach($service->features as $feature)
                            <li class="flex items-center text-gray-700">
                                <i class="fas fa-check-circle text-[#71b346] mr-3"></i>
                                <span>{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-[#04726d] font-bold hover:text-[#71b346] transition-colors group">
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

<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Our Services?</h2>
            <div class="w-24 h-1 bg-[#71b346] mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-[#04726d]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-certificate text-4xl text-[#04726d]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2 text-xl">Certified Professionals</h4>
                <p class="text-gray-600">Tim yang terlatih dan bersertifikat dengan pengalaman bertahun-tahun</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-[#71b346]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-clock text-4xl text-[#71b346]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2 text-xl">24/7 Support</h4>
                <p class="text-gray-600">Layanan dukungan tersedia kapan saja untuk kebutuhan Anda</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-[#04726d]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-dollar-sign text-4xl text-[#04726d]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2 text-xl">Competitive Pricing</h4>
                <p class="text-gray-600">Harga yang kompetitif dengan kualitas layanan terbaik</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-[#04726d] to-[#71b346] rounded-3xl p-12 text-center" data-aos="fade-up">
            <h3 class="text-3xl font-bold text-white mb-4">Ready to Get Started?</h3>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">Hubungi kami sekarang untuk mendapatkan konsultasi gratis dan penawaran terbaik.</p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="bg-white text-[#04726d] px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl">
                    Contact Us
                </a>
                <a href="tel:021-26692269" class="bg-transparent border-2 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-[#04726d] transition">
                    Call Now
                </a>
            </div>
        </div>
    </div>
</section>

<x-footer />

<!-- Scroll to Top -->
<button id="scrollTop" class="fixed bottom-8 right-8 w-14 h-14 bg-gradient-to-br from-[#04726d] to-[#71b346] text-white rounded-full shadow-2xl hover:shadow-3xl transition-all duration-300 opacity-0 pointer-events-none z-50 flex items-center justify-center transform hover:scale-110 group">
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
