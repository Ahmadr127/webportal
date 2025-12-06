@extends('layouts.home')

@php
    $primaryColor = $siteSetting->primary_color ?? '#04726d';
    $secondaryColor = $siteSetting->secondary_color ?? '#71b346';
@endphp

@section('content')
<x-navbar />

<!-- Article Header -->
<section class="relative py-20" style="background: linear-gradient(to right, {{ $primaryColor }}, {{ $secondaryColor }});">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-white">
            <!-- Category & Date -->
            <div class="flex items-center text-sm mb-4" data-aos="fade-up">
                @if($news->category)
                <span class="bg-white/20 px-4 py-1 rounded-full">{{ $news->category->name }}</span>
                <span class="mx-3">•</span>
                @endif
                <i class="fas fa-calendar-alt mr-2"></i>
                {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
                <span class="mx-3">•</span>
                <i class="fas fa-eye mr-2"></i>
                {{ $news->views_count }} views
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold mb-4" data-aos="fade-up" data-aos-delay="100">
                {{ $news->title }}
            </h1>
            
            <!-- Author -->
            <div class="flex items-center" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-user-circle text-2xl mr-3"></i>
                <span>{{ $news->author->name ?? 'Admin' }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Featured Image -->
            @if($news->image)
            <div class="mb-12 rounded-2xl overflow-hidden shadow-2xl" data-aos="fade-up">
                <img src="{{ str_starts_with($news->image, 'http') ? $news->image : asset('storage/' . $news->image) }}" 
                     alt="{{ $news->title }}" 
                     class="w-full h-auto">
            </div>
            @endif
            
            <!-- Excerpt -->
            <div class="border-l-4 p-6 rounded-r-lg mb-12" data-aos="fade-up" style="background: linear-gradient(to right, {{ $primaryColor }}20, {{ $secondaryColor }}20); border-color: {{ $primaryColor }};">
                <p class="text-lg text-gray-700 italic">{{ $news->excerpt }}</p>
            </div>
            
            <!-- Article Content -->
            <div class="prose prose-lg max-w-none" data-aos="fade-up">
                {!! $news->content !!}
            </div>
            
            <!-- Tags -->
            @if($news->tags->count() > 0)
            <div class="mt-12 pt-8 border-t border-gray-200" data-aos="fade-up">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Tags:</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($news->tags as $tag)
                    <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm hover:text-white transition-colors cursor-pointer" style="background-color: #f3f4f6;" onmouseover="this.style.backgroundColor='{{ $primaryColor }}'; this.style.color='white';" onmouseout="this.style.backgroundColor='#f3f4f6'; this.style.color='#374151';">
                        #{{ $tag->name }}
                    </span>
                    @endforeach
                </div>
            </div>
            @endif
            
            <!-- Share Buttons -->
            <div class="mt-12 pt-8 border-t border-gray-200" data-aos="fade-up">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Share this article:</h3>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $news->slug)) }}" 
                       target="_blank"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors inline-flex items-center">
                        <i class="fab fa-facebook-f mr-2"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('news.show', $news->slug)) }}&text={{ urlencode($news->title) }}" 
                       target="_blank"
                       class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-lg transition-colors inline-flex items-center">
                        <i class="fab fa-twitter mr-2"></i> Twitter
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($news->title . ' - ' . route('news.show', $news->slug)) }}" 
                       target="_blank"
                       class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-colors inline-flex items-center">
                        <i class="fab fa-whatsapp mr-2"></i> WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related News -->
@if($relatedNews->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12" data-aos="fade-up">Related News</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedNews as $index => $related)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="h-48 overflow-hidden">
                    <img src="{{ $related->image ? (str_starts_with($related->image, 'http') ? $related->image : asset('storage/' . $related->image)) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800&q=80' }}" 
                         alt="{{ $related->title }}" 
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                </div>
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        {{ $related->published_at ? $related->published_at->format('d F Y') : $related->created_at->format('d F Y') }}
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3 hover:transition-colors line-clamp-2" style="cursor: pointer;" onmouseover="this.style.color='{{ $primaryColor }}'" onmouseout="this.style.color='#111827'">
                        {{ $related->title }}
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ $related->excerpt }}</p>
                    <a href="{{ route('news.show', $related->slug) }}" class="inline-flex items-center font-semibold hover:transition-colors" style="color: {{ $primaryColor }};" onmouseover="this.style.color='{{ $secondaryColor }}'" onmouseout="this.style.color='{{ $primaryColor }}';">
                        Read More
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Back to News Button -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 text-center">
        <a href="{{ route('news') }}" class="inline-flex items-center text-white px-8 py-4 rounded-full font-semibold hover:shadow-xl transition-all duration-300 transform hover:scale-105" style="background: linear-gradient(to right, {{ $primaryColor }}, {{ $secondaryColor }});">
            <i class="fas fa-arrow-left mr-3"></i>
            Back to All News
        </a>
    </div>
</section>

<x-footer />
@endsection
