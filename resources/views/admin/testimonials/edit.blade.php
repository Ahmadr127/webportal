@extends('layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Edit Testimonial</h2>
            <a href="{{ route('admin.testimonials.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back
            </a>
        </div>

        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content (2 columns) -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="client_name" class="block text-sm font-medium text-gray-700">Client Name <span class="text-red-500">*</span></label>
                            <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('client_name') border-red-500 @enderror">
                            @error('client_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client_position" class="block text-sm font-medium text-gray-700">Position</label>
                            <input type="text" name="client_position" id="client_position" value="{{ old('client_position', $testimonial->client_position) }}"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('client_position') border-red-500 @enderror">
                            @error('client_position')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="client_company" class="block text-sm font-medium text-gray-700">Company</label>
                        <input type="text" name="client_company" id="client_company" value="{{ old('client_company', $testimonial->client_company) }}"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('client_company') border-red-500 @enderror">
                        @error('client_company')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        @if($testimonial->client_avatar)
                        <label class="block text-sm font-medium text-gray-700">Current Avatar</label>
                        <div class="mt-2 mb-3">
                            <img src="{{ asset('storage/' . $testimonial->client_avatar) }}" alt="{{ $testimonial->client_name }}" class="h-24 w-24 rounded-full object-cover border">
                        </div>
                        @endif
                        
                        <label for="client_avatar" class="block text-sm font-medium text-gray-700 mt-2">{{ $testimonial->client_avatar ? 'Change Avatar' : 'Upload Avatar' }}</label>
                        <input type="file" name="client_avatar" id="client_avatar" accept="image/*"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                        <p class="mt-1 text-sm text-gray-500">Leave empty to keep current avatar</p>
                        @error('client_avatar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="testimonial" class="block text-sm font-medium text-gray-700">Testimonial <span class="text-red-500">*</span></label>
                        <textarea name="testimonial" id="testimonial" rows="6" required
                                  class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm @error('testimonial') border-red-500 @enderror">{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                        @error('testimonial')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Sidebar (1 column) -->
                <div class="space-y-6">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900 mb-4">Options</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="rating" class="block text-sm font-medium text-gray-700">Rating <span class="text-red-500">*</span></label>
                                <select name="rating" id="rating" required
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                    @for($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                        {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                                        @for($j = 0; $j < $i; $j++) ⭐ @endfor
                                    </option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="order" class="block text-sm font-medium text-gray-700">Display Order</label>
                                <input type="number" name="order" id="order" value="{{ old('order', $testimonial->order) }}"
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                    Active (visible on website)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-gray-900 mb-2">Information</h3>
                        <div class="text-sm text-gray-600 space-y-1">
                            <p><strong>Created:</strong> {{ $testimonial->created_at->format('d M Y H:i') }}</p>
                            <p><strong>Updated:</strong> {{ $testimonial->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i>
                            Update Testimonial
                        </button>
                        <a href="{{ route('admin.testimonials.index') }}" class="w-full bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded inline-flex items-center justify-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
