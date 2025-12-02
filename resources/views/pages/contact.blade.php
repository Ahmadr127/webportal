@extends('layouts.home')

@section('content')
<x-navbar />

<!-- Page Header -->
<section class="relative bg-[#04726d] py-24">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4" data-aos="fade-up">Contact Us</h1>
        <p class="text-xl opacity-90" data-aos="fade-up" data-aos-delay="100">Hubungi Kami untuk Informasi Lebih Lanjut</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-xl p-10" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Send us a Message</h2>
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#04726d] focus:bg-white transition-all @error('name') border-red-500 @enderror" placeholder="John Doe">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#04726d] focus:bg-white transition-all @error('email') border-red-500 @enderror" placeholder="john@example.com">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                        <select name="subject" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#04726d] focus:bg-white transition-all @error('subject') border-red-500 @enderror">
                            <option value="">-- Select Subject --</option>
                            <option value="General Inquiry" {{ old('subject') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="Parking Management" {{ old('subject') == 'Parking Management' ? 'selected' : '' }}>Parking Management</option>
                            <option value="Cleaning Service" {{ old('subject') == 'Cleaning Service' ? 'selected' : '' }}>Cleaning Service</option>
                            <option value="Security Service" {{ old('subject') == 'Security Service' ? 'selected' : '' }}>Security Service</option>
                            <option value="Partnership" {{ old('subject') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                        </select>
                        @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                        <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#04726d] focus:bg-white transition-all @error('message') border-red-500 @enderror" placeholder="Tell us about your needs...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-[#04726d] to-[#71b346] text-white py-4 rounded-lg font-bold text-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div data-aos="fade-left">
                <div class="bg-white rounded-3xl shadow-xl p-10 mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Get in Touch</h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-[#04726d]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-2xl text-[#04726d]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1 text-lg">Office Address</h4>
                                <p class="text-gray-600 leading-relaxed">{{ $contactInfo->address ?? 'Jl. Tiang Bendera V Rukan Batavia Unit R-S No.41-43, Kel. Roa Malaka, Tambora, Jakarta Barat 11230' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-[#71b346]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone-alt text-2xl text-[#71b346]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1 text-lg">Phone</h4>
                                <p class="text-gray-600">{{ $contactInfo->phone_1 ?? '021-26692269' }}</p>
                                @if($contactInfo->phone_2)
                                <p class="text-gray-600">{{ $contactInfo->phone_2 }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-[#04726d]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-2xl text-[#04726d]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1 text-lg">Email</h4>
                                <p class="text-gray-600">{{ $contactInfo->email ?? 'contact@ezservices.co.id' }}</p>
                            </div>
                        </div>
                        
                        @if($contactInfo->fax)
                        <div class="flex items-start space-x-4">
                            <div class="w-14 h-14 bg-[#71b346]/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-fax text-2xl text-[#71b346]"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1 text-lg">Fax</h4>
                                <p class="text-gray-600">{{ $contactInfo->fax }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Business Hours -->
                <div class="bg-gradient-to-br from-[#04726d] to-[#71b346] rounded-3xl shadow-xl p-10 text-white">
                    <h3 class="text-2xl font-bold mb-6">Business Hours</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-white/20">
                            <span class="font-medium">Monday - Friday</span>
                            <span class="font-bold">08:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b border-white/20">
                            <span class="font-medium">Saturday</span>
                            <span class="font-bold">08:00 - 12:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Sunday</span>
                            <span class="font-bold">Closed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-0 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="rounded-3xl overflow-hidden shadow-xl" data-aos="fade-up">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.9999999999995!2d106.8!3d-6.15!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMDknMDAuMCJTIDEwNsKwNDgnMDAuMCJF!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<!-- Social Media -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Follow Us on Social Media</h3>
        <div class="flex justify-center space-x-4">
            @if($contactInfo->facebook_url)
            <a href="{{ $contactInfo->facebook_url }}" target="_blank" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-[#04726d] hover:bg-[#04726d] hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:scale-110">
                <i class="fab fa-facebook-f text-xl"></i>
            </a>
            @endif
            @if($contactInfo->instagram_url)
            <a href="{{ $contactInfo->instagram_url }}" target="_blank" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-[#04726d] hover:bg-[#04726d] hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:scale-110">
                <i class="fab fa-instagram text-xl"></i>
            </a>
            @endif
            @if($contactInfo->twitter_url)
            <a href="{{ $contactInfo->twitter_url }}" target="_blank" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-[#04726d] hover:bg-[#04726d] hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:scale-110">
                <i class="fab fa-twitter text-xl"></i>
            </a>
            @endif
            <a href="https://wa.me/6281234567890" target="_blank" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-[#04726d] hover:bg-[#04726d] hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:scale-110">
                <i class="fab fa-whatsapp text-xl"></i>
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
