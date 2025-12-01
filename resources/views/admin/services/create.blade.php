@extends('layouts.app')

@section('title', 'Create Service')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Create New Service</h1>
            <p class="text-gray-600 mt-1">Add a new service to your website</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Service Details</h2>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
                        @csrf

                        <!-- Icon -->
                        <div class="mb-6">
                            <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">
                                Icon (FontAwesome class) <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('icon') border-red-500 @enderror" 
                                   id="icon" 
                                   name="icon" 
                                   value="{{ old('icon') }}" 
                                   placeholder="fa-cog" 
                                   required>
                            @error('icon')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Example: fa-cog, fa-users, fa-shield-alt</p>
                        </div>

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('title') border-red-500 @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}" 
                                   required>
                            @error('title')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div class="mb-6">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                            <input type="text" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('slug') border-red-500 @enderror" 
                                   id="slug" 
                                   name="slug" 
                                   value="{{ old('slug') }}">
                            @error('slug')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500">Leave empty for auto-generate</p>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-6">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Short Description <span class="text-red-500">*</span>
                            </label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('short_description') border-red-500 @enderror" 
                                      id="short_description" 
                                      name="short_description" 
                                      rows="3" 
                                      required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Full Description -->
                        <div class="mb-6">
                            <label for="full_description" class="block text-sm font-medium text-gray-700 mb-2">Full Description</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('full_description') border-red-500 @enderror" 
                                      id="full_description" 
                                      name="full_description" 
                                      rows="6">{{ old('full_description') }}</textarea>
                            @error('full_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Service Image</label>
                            <input type="file" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('image') border-red-500 @enderror" 
                                   id="image" 
                                   name="image" 
                                   accept="image/*">
                            @error('image')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <hr class="my-8 border-gray-200">

                        <!-- Features Section -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Features</h3>
                            <div id="features-container" class="space-y-2">
                                @foreach(old('features', ['']) as $index => $feature)
                                <div class="flex gap-2">
                                    <input type="text" 
                                           name="features[]" 
                                           class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" 
                                           value="{{ $feature }}" 
                                           placeholder="Enter feature">
                                    <button type="button" 
                                            class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200 remove-feature">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" 
                                    class="mt-3 inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-colors duration-200" 
                                    id="add-feature">
                                <i class="fas fa-plus mr-2"></i> Add Feature
                            </button>
                        </div>

                        <hr class="my-8 border-gray-200">

                        <!-- SEO Settings -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">SEO Settings</h3>
                            
                            <div class="mb-4">
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                                <input type="text" 
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" 
                                       id="meta_title" 
                                       name="meta_title" 
                                       value="{{ old('meta_title') }}">
                            </div>

                            <div class="mb-4">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" 
                                          id="meta_description" 
                                          name="meta_description" 
                                          rows="2">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex gap-3 pt-6 border-t border-gray-200">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md">
                                <i class="fas fa-save mr-2"></i> Create Service
                            </button>
                            <a href="{{ route('admin.services.index') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors duration-200">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md overflow-hidden sticky top-6">
                <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white">Options</h2>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                        <input type="number" 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" 
                               id="order" 
                               name="order" 
                               value="{{ old('order', 0) }}" 
                               form="serviceForm">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" 
                                   class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1" 
                                   {{ old('is_active', true) ? 'checked' : '' }} 
                                   form="serviceForm">
                            <span class="ml-2 text-sm text-gray-700">Active (visible on website)</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    titleInput.addEventListener('blur', function() {
        if (slugInput.value === '') {
            const slug = this.value.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
            slugInput.value = slug;
        }
    });

    // Add feature
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const div = document.createElement('div');
        div.className = 'flex gap-2';
        div.innerHTML = `
            <input type="text" name="features[]" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="Enter feature">
            <button type="button" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors duration-200 remove-feature">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    });

    // Remove feature
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-feature')) {
            e.target.closest('.flex').remove();
        }
    });
});
</script>

<!-- CKEditor Local -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
// Initialize CKEditor for full description
CKEDITOR.replace('full_description', {
    height: 400
});
</script>
@endpush
