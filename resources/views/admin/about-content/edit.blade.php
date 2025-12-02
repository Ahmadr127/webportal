@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                <h2 class="text-2xl font-bold text-white">Edit About Section</h2>
            </div>

            <form action="{{ route('admin.about-content.update', $aboutContent) }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <!-- Current Image Preview -->
                @if($aboutContent->image)
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Current Image
                    </label>
                    <img src="{{ str_starts_with($aboutContent->image, 'http') ? $aboutContent->image : asset('storage/' . $aboutContent->image) }}" alt="{{ $aboutContent->title }}" class="h-48 w-auto rounded border">
                </div>
                @endif

                <!-- Section Key -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Section Key <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="section_key" value="{{ old('section_key', $aboutContent->section_key) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('section_key') border-red-500 @enderror"
                           placeholder="our_story">
                    <p class="text-sm text-gray-600 mt-1">Unique identifier for this section (e.g., our_story, our_mission)</p>
                    @error('section_key')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title', $aboutContent->title) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                           placeholder="Our Story">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subtitle -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Subtitle
                    </label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $aboutContent->subtitle) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('subtitle') border-red-500 @enderror"
                           placeholder="About Us">
                    @error('subtitle')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" rows="8" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('content') border-red-500 @enderror"
                              placeholder="Enter the content for this section...">{{ old('content', $aboutContent->content) }}</textarea>
                    <p class="text-sm text-gray-600 mt-1">You can use HTML tags for formatting</p>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        New Section Image (Optional)
                    </label>
                    <input type="file" name="image" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
                    <p class="text-sm text-gray-600 mt-1">Leave empty to keep current image. Recommended size: 800x600px. Max size: 2MB</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order & Active Status -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Order <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="order" value="{{ old('order', $aboutContent->order) }}" min="0" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('order') border-red-500 @enderror">
                        <p class="text-sm text-gray-600 mt-1">Lower numbers appear first</p>
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Status
                        </label>
                        <div class="flex items-center mt-2">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $aboutContent->is_active) ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.about-content.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Update Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
