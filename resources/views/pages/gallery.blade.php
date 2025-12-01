@extends('layouts.home')

@section('content')
<x-navbar />

<!-- Page Header -->
<section class="relative bg-gradient-to-r from-[#04726d] to-[#71b346] py-24">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4" data-aos="fade-up">Gallery</h1>
        <p class="text-xl opacity-90" data-aos="fade-up" data-aos-delay="100">Dokumentasi Layanan & Proyek Kami</p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($galleryImages->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-data="{ lightbox: false, currentImage: '', currentTitle: '' }">
            @foreach($galleryImages as $index => $image)
            <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 50 }}"
                 @click="lightbox = true; currentImage = '{{ $image->image ? (str_starts_with($image->image, 'http') ? $image->image : asset('storage/' . $image->image)) : '' }}'; currentTitle = '{{ $image->title }}'">
                <img src="{{ $image->image ? (str_starts_with($image->image, 'http') ? $image->image : asset('storage/' . $image->image)) : 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80' }}" 
                     alt="{{ $image->title }}" 
                     class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                    <div class="p-6 text-white">
                        <h3 class="text-xl font-bold">{{ $image->title }}</h3>
                        @if($image->category)
                        <p class="text-sm opacity-90 mt-1">{{ $image->category->name }}</p>
                        @endif
                        <div class="flex items-center mt-2 text-sm">
                            <i class="fas fa-search-plus mr-2"></i>
                            <span>Click to view</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Lightbox Modal -->
            <div x-show="lightbox" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 @click="lightbox = false"
                 class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center p-4"
                 style="display: none;">
                <button @click="lightbox = false" class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300 transition">
                    <i class="fas fa-times"></i>
                </button>
                <div class="text-center">
                    <img :src="currentImage" alt="Gallery Image" class="max-w-full max-h-[80vh] object-contain rounded-lg mb-4">
                    <h3 class="text-white text-xl font-bold" x-text="currentTitle"></h3>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-12">
            <i class="fas fa-images text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada gambar di galeri.</p>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-[#04726d] to-[#71b346] rounded-3xl p-12 text-center" data-aos="fade-up">
            <h3 class="text-3xl font-bold text-white mb-4">Tertarik dengan Layanan Kami?</h3>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">Hubungi kami untuk konsultasi gratis dan dapatkan penawaran terbaik untuk kebutuhan fasilitas Anda.</p>
            <a href="{{ route('contact') }}" class="inline-block bg-white text-[#04726d] px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition transform hover:scale-105 shadow-xl">
                Contact Us Now
            </a>
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
