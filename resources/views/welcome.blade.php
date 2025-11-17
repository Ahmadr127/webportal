@extends('layouts.home')

@section('content')
<!-- Navigation -->
<x-navbar />

<!-- Hero Section with Slider -->
<section id="home" class="hero-slider relative">
    <div class="slide active" style="background: linear-gradient(135deg, rgba(4, 114, 109, 0.8) 0%, rgba(113, 179, 70, 0.8) 100%), url('https://images.unsplash.com/photo-1590674899484-d5640e854abe?w=1920') center/cover;">
        <div class="container mx-auto px-4 py-32 md:py-48">
            <div class="max-w-3xl text-white">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">CASHLESS PARKING PAYMENT</h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">SCAN - TAP - GO</p>
                <p class="text-lg mb-8 opacity-90">BAYAR PARKIR CEPAT & MUDAH</p>
                <div class="flex flex-wrap gap-4">
                    <button class="bg-white text-[#04726d] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Learn More</button>
                    <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-[#04726d] transition">Contact Us</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section id="about" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Welcome to EZ Services</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#04726d] to-[#71b346] mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-4xl mx-auto">
                Penyedia Jasa Pengelola Parkir, Jasa Keamanan Satpam & Jasa Cleaning Service terbaik yang bertumpu pada nilai keamanan, ekonomis, profesional, inovasi & kenyamanan jasa kami
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <x-service-card 
                    :icon="$service['icon']" 
                    :title="$service['title']" 
                    :description="$service['description']" 
                />
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="our-service" class="py-20 relative">
    <div class="absolute inset-0 gradient-overlay"></div>
    <div class="absolute inset-0" style="background: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920') center/cover; opacity: 0.2;"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Why Choose Us</h2>
            <div class="w-24 h-1 bg-white mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($features as $feature)
                <x-feature-card 
                    :icon="$feature['icon']" 
                    :title="$feature['title']" 
                    :description="$feature['description']" 
                />
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Get In Touch</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-[#04726d] to-[#71b346] mx-auto mb-6"></div>
            <p class="text-lg text-gray-600">Have a question or need our services? Contact us today!</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h3>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#71b346]" placeholder="Your name">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#71b346]" placeholder="your@email.com">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#71b346]" placeholder="Your phone number">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#71b346]" placeholder="Your message"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-[#04726d] to-[#71b346] text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <div class="bg-white rounded-xl shadow-lg p-8 mb-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#04726d] to-[#71b346] rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Address</h4>
                                <p class="text-gray-600">Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#04726d] to-[#71b346] rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Phone</h4>
                                <p class="text-gray-600">021-26692269, 021-22692977</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#04726d] to-[#71b346] rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Email</h4>
                                <p class="text-gray-600">contact@ezservices.co.id</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-[#04726d] to-[#71b346] rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-fax text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 mb-1">Fax</h4>
                                <p class="text-gray-600">021-26073929</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map or Additional Info -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Business Hours</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Monday - Friday</span>
                            <span class="font-semibold text-gray-800">08:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Saturday</span>
                            <span class="font-semibold text-gray-800">08:00 - 12:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Sunday</span>
                            <span class="font-semibold text-gray-800">Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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