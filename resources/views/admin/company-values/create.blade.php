@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                <h2 class="text-2xl font-bold text-white">Create New Company Value</h2>
            </div>

            <form action="{{ route('admin.company-values.store') }}" method="POST" class="p-6">
                @csrf

                <!-- Icon -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Icon (FontAwesome) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="icon" value="{{ old('icon') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('icon') border-red-500 @enderror"
                           placeholder="fa-heart">
                    <p class="text-sm text-gray-600 mt-1">
                        Enter FontAwesome icon class (e.g., fa-heart, fa-star, fa-trophy). 
                        <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-600 hover:underline">Browse icons</a>
                    </p>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror"
                           placeholder="Innovation">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" rows="4" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                              placeholder="We constantly innovate to provide the best solutions...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order & Active Status -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Order <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="order" value="{{ old('order', 0) }}" min="0" required
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
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_active" class="ml-2 text-sm text-gray-700">Active</label>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.company-values.index') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Create Value
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
