@extends('layouts.home')

@section('content')
<x-navbar />

<!-- Page Header -->
<section class="relative bg-gradient-to-r from-[#04726d] to-[#71b346] py-24">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4" data-aos="fade-up">About Us</h1>
        <p class="text-xl opacity-90" data-aos="fade-up" data-aos-delay="100">Mengenal Lebih Dekat EZ Services</p>
    </div>
</section>

<!-- Company Profile -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=800&q=80" alt="Team" class="rounded-2xl shadow-2xl">
            </div>
            <div data-aos="fade-left">
                <span class="text-[#71b346] font-bold uppercase text-sm">Our Story</span>
                <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-6">PT. Anugerah Bina Karya</h2>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Didirikan dengan visi untuk menjadi penyedia layanan fasilitas terbaik di Indonesia, EZ Services telah melayani berbagai klien dari berbagai sektor industri selama lebih dari 10 tahun.
                </p>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Kami berkomitmen untuk memberikan solusi terintegrasi yang mencakup pengelolaan parkir, layanan keamanan, dan kebersihan dengan standar profesional tertinggi.
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-3xl font-bold text-[#04726d]">10+</div>
                        <div class="text-sm text-gray-600">Tahun Pengalaman</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="text-3xl font-bold text-[#04726d]">50+</div>
                        <div class="text-sm text-gray-600">Klien Terpercaya</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Visi & Misi</h2>
            <div class="w-24 h-1 bg-[#71b346] mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-[#04726d]/10 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-eye text-3xl text-[#04726d]"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Visi</h3>
                <p class="text-gray-600 leading-relaxed">
                    Menjadi perusahaan penyedia jasa pengelolaan fasilitas terkemuka di Indonesia yang dikenal dengan kualitas layanan, profesionalisme, dan inovasi berkelanjutan.
                </p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-[#71b346]/10 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-bullseye text-3xl text-[#71b346]"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Misi</h3>
                <ul class="text-gray-600 leading-relaxed space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-check text-[#71b346] mt-1 mr-2"></i>
                        <span>Memberikan layanan berkualitas tinggi dengan standar internasional</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-[#71b346] mt-1 mr-2"></i>
                        <span>Mengembangkan SDM yang kompeten dan profesional</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-[#71b346] mt-1 mr-2"></i>
                        <span>Menerapkan teknologi terkini untuk efisiensi operasional</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Nilai-Nilai Kami</h2>
            <div class="w-24 h-1 bg-[#71b346] mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-[#04726d]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-4xl text-[#04726d]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Integrity</h4>
                <p class="text-sm text-gray-600">Berkomitmen pada kejujuran dan transparansi</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="w-20 h-20 bg-[#71b346]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-4xl text-[#71b346]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Excellence</h4>
                <p class="text-sm text-gray-600">Selalu memberikan yang terbaik</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-[#04726d]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-4xl text-[#04726d]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Innovation</h4>
                <p class="text-sm text-gray-600">Terus berinovasi untuk kemajuan</p>
            </div>
            
            <div class="text-center p-6" data-aos="fade-up" data-aos-delay="400">
                <div class="w-20 h-20 bg-[#71b346]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-4xl text-[#71b346]"></i>
                </div>
                <h4 class="font-bold text-gray-900 mb-2">Teamwork</h4>
                <p class="text-sm text-gray-600">Kerjasama untuk hasil maksimal</p>
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
