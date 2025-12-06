@extends('layouts.home')

@php
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
    $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
@endphp

@section('content')
<x-navbar />

<!-- News Grid -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        @if($newsItems->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($newsItems as $index => $news)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $news->image ? (str_starts_with($news->image, 'http') ? $news->image : asset('storage/' . $news->image)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800&q=80' }}" 
                         alt="{{ $news->title }}" 
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
                        @if($news->category)
                        <span class="mx-2">•</span>
                        <span style="color: {{ $primaryColor }};">{{ $news->category->name }}</span>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 hover:transition-colors" style="cursor: pointer;" onmouseover="this.style.color='{{ $primaryColor }}'" onmouseout="this.style.color='#111827'">{{ $news->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $news->excerpt }}</p>
                    <a href="{{ route('news.show', $news->slug) }}" class="inline-flex items-center font-semibold hover:transition-colors" style="color: {{ $primaryColor }};" onmouseover="this.style.color='{{ $secondaryColor }}'" onmouseout="this.style.color='{{ $primaryColor }}';">
                        Baca Selengkapnya
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        @if($newsItems->hasPages())
        <div class="mt-12">
            {{ $newsItems->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-12">
            <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 text-lg">Belum ada berita tersedia.</p>
        </div>
        @endif
    </div>
</section>

<!-- Removed Newsletter Subscription -->


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
