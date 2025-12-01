@extends('layouts.app')

@section('title', 'View News')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">View Article</h2>
            <div class="flex gap-2">
                @if(Auth::user()->hasPermission('edit_news'))
                <a href="{{ route('admin.news.edit', $news) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                @endif
                <a href="{{ route('admin.news.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content (2 columns) -->
            <div class="lg:col-span-2">
                <!-- Article Content Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <!-- Featured Image -->
                    @if($news->image)
                    <div class="w-full">
                        <img src="{{ str_starts_with($news->image, 'http') ? $news->image : asset('storage/' . $news->image) }}" 
                             alt="{{ $news->title }}" 
                             class="w-full h-96 object-cover">
                    </div>
                    @endif

                    <div class="p-6">
                        <!-- Title -->
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $news->title }}</h1>

                        <!-- Meta Info -->
                        <div class="flex flex-wrap gap-4 mb-6 text-sm text-gray-600">
                            <span class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                {{ $news->author->name ?? 'Unknown' }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-calendar mr-2"></i>
                                {{ $news->published_at ? $news->published_at->format('d M Y H:i') : 'Not published' }}
                            </span>
                            <span class="flex items-center">
                                <i class="fas fa-eye mr-2"></i>
                                {{ $news->views_count }} views
                            </span>
                            @if($news->category)
                            <span class="flex items-center">
                                <i class="fas fa-folder mr-2"></i>
                                {{ $news->category->name }}
                            </span>
                            @endif
                        </div>

                        <!-- Excerpt -->
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
                            <p class="text-blue-900"><strong>Excerpt:</strong> {{ $news->excerpt }}</p>
                        </div>

                        <!-- Content -->
                        <div class="prose max-w-none">
                            {!! $news->content !!}
                        </div>

                        <!-- Tags -->
                        @if($news->tags->count() > 0)
                        <hr class="my-6">
                        <div>
                            <strong class="text-gray-700">Tags:</strong>
                            <div class="flex flex-wrap gap-2 mt-2">
                                @foreach($news->tags as $tag)
                                <span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar (1 column) -->
            <div class="space-y-6">
                <!-- Status Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Status</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <strong class="text-gray-700">Publication Status:</strong><br>
                            @if($news->is_published)
                            <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold mt-1">Published</span>
                            @else
                            <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold mt-1">Draft</span>
                            @endif
                        </div>

                        <div>
                            <strong class="text-gray-700">Slug:</strong><br>
                            <code class="bg-gray-100 px-2 py-1 rounded text-sm">{{ $news->slug }}</code>
                        </div>

                        @if($news->published_at)
                        <div>
                            <strong class="text-gray-700">Published Date:</strong><br>
                            <span class="text-gray-600">{{ $news->published_at->format('d M Y H:i') }}</span>
                        </div>
                        @endif

                        <div>
                            <strong class="text-gray-700">Created:</strong><br>
                            <span class="text-gray-600">{{ $news->created_at->format('d M Y H:i') }}</span>
                        </div>

                        <div>
                            <strong class="text-gray-700">Last Updated:</strong><br>
                            <span class="text-gray-600">{{ $news->updated_at->format('d M Y H:i') }}</span>
                        </div>

                        <div>
                            <strong class="text-gray-700">Views:</strong><br>
                            <span class="text-gray-600">{{ $news->views_count }}</span>
                        </div>
                    </div>
                </div>

                <!-- SEO Card -->
                @if($news->meta_title || $news->meta_description)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">SEO Information</h3>
                    
                    <div class="space-y-4">
                        @if($news->meta_title)
                        <div>
                            <strong class="text-gray-700">Meta Title:</strong><br>
                            <span class="text-gray-600">{{ $news->meta_title }}</span>
                        </div>
                        @endif

                        @if($news->meta_description)
                        <div>
                            <strong class="text-gray-700">Meta Description:</strong><br>
                            <span class="text-gray-600">{{ $news->meta_description }}</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Actions Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Actions</h3>
                    
                    <div class="space-y-2">
                        @if(Auth::user()->hasPermission('publish_news'))
                        <form action="{{ route('admin.news.toggle-publish', $news) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-{{ $news->is_published ? 'yellow' : 'green' }}-600 hover:bg-{{ $news->is_published ? 'yellow' : 'green' }}-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
                                <i class="fas fa-{{ $news->is_published ? 'eye-slash' : 'check' }} mr-2"></i>
                                {{ $news->is_published ? 'Unpublish' : 'Publish' }}
                            </button>
                        </form>
                        @endif

                        @if(Auth::user()->hasPermission('delete_news'))
                        <form action="{{ route('admin.news.destroy', $news) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this article?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
                                <i class="fas fa-trash mr-2"></i> Delete Article
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
