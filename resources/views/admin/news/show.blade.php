@extends('layouts.app')

@section('title', 'View News')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Article</h1>
        <div>
            @if(Auth::user()->hasPermission('edit_news'))
            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Edit
            </a>
            @endif
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Article Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Article Content</h6>
                </div>
                <div class="card-body">
                    <!-- Featured Image -->
                    @if($news->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid rounded">
                    </div>
                    @endif

                    <!-- Title -->
                    <h2 class="mb-3">{{ $news->title }}</h2>

                    <!-- Meta Info -->
                    <div class="mb-4 text-muted">
                        <span class="mr-3">
                            <i class="fas fa-user"></i> {{ $news->author->name ?? 'Unknown' }}
                        </span>
                        <span class="mr-3">
                            <i class="fas fa-calendar"></i> 
                            {{ $news->published_at ? $news->published_at->format('d M Y H:i') : 'Not published' }}
                        </span>
                        <span class="mr-3">
                            <i class="fas fa-eye"></i> {{ $news->views_count }} views
                        </span>
                        @if($news->category)
                        <span class="mr-3">
                            <i class="fas fa-folder"></i> {{ $news->category->name }}
                        </span>
                        @endif
                    </div>

                    <!-- Excerpt -->
                    <div class="alert alert-info">
                        <strong>Excerpt:</strong> {{ $news->excerpt }}
                    </div>

                    <!-- Content -->
                    <div class="article-content">
                        {!! nl2br(e($news->content)) !!}
                    </div>

                    <!-- Tags -->
                    @if($news->tags->count() > 0)
                    <hr>
                    <div class="mt-4">
                        <strong>Tags:</strong>
                        @foreach($news->tags as $tag)
                        <span class="badge badge-secondary">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Status Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Publication Status:</strong><br>
                        @if($news->is_published)
                        <span class="badge badge-success badge-lg">Published</span>
                        @else
                        <span class="badge badge-warning badge-lg">Draft</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <strong>Slug:</strong><br>
                        <code>{{ $news->slug }}</code>
                    </div>

                    @if($news->published_at)
                    <div class="mb-3">
                        <strong>Published Date:</strong><br>
                        {{ $news->published_at->format('d M Y H:i') }}
                    </div>
                    @endif

                    <div class="mb-3">
                        <strong>Created:</strong><br>
                        {{ $news->created_at->format('d M Y H:i') }}
                    </div>

                    <div class="mb-3">
                        <strong>Last Updated:</strong><br>
                        {{ $news->updated_at->format('d M Y H:i') }}
                    </div>

                    <div class="mb-3">
                        <strong>Views:</strong><br>
                        {{ $news->views_count }}
                    </div>
                </div>
            </div>

            <!-- SEO Card -->
            @if($news->meta_title || $news->meta_description)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">SEO Information</h6>
                </div>
                <div class="card-body">
                    @if($news->meta_title)
                    <div class="mb-3">
                        <strong>Meta Title:</strong><br>
                        {{ $news->meta_title }}
                    </div>
                    @endif

                    @if($news->meta_description)
                    <div class="mb-3">
                        <strong>Meta Description:</strong><br>
                        {{ $news->meta_description }}
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Actions Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>
                <div class="card-body">
                    @if(Auth::user()->hasPermission('publish_news'))
                    <form action="{{ route('admin.news.toggle-publish', $news) }}" method="POST" class="mb-2">
                        @csrf
                        <button type="submit" class="btn btn-{{ $news->is_published ? 'warning' : 'success' }} btn-block">
                            <i class="fas fa-{{ $news->is_published ? 'eye-slash' : 'check' }}"></i>
                            {{ $news->is_published ? 'Unpublish' : 'Publish' }}
                        </button>
                    </form>
                    @endif

                    @if(Auth::user()->hasPermission('delete_news'))
                    <form action="{{ route('admin.news.destroy', $news) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this article?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash"></i> Delete Article
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
