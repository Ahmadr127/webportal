@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                <h2 class="text-2xl font-bold text-white">Site Settings</h2>
            </div>

            @if(session('success'))
                <div class="mx-6 mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <!-- App Name -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Application Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="app_name" value="{{ old('app_name', $setting->app_name) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('app_name') border-red-500 @enderror"
                           required>
                    @error('app_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- App Tagline -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Tagline / Subtitle
                    </label>
                    <input type="text" name="app_tagline" value="{{ old('app_tagline', $setting->app_tagline) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('app_tagline') border-red-500 @enderror">
                    @error('app_tagline')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Logo -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Logo
                    </label>
                    @if($setting->logo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Current Logo" class="h-20 border rounded">
                            <p class="text-sm text-gray-600 mt-1">Current Logo</p>
                        </div>
                    @endif
                    <input type="file" name="logo" accept="image/*"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('logo') border-red-500 @enderror">
                    <p class="text-sm text-gray-600 mt-1">Accepted formats: JPG, PNG, SVG. Max size: 2MB</p>
                    @error('logo')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Favicon -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Favicon
                    </label>
                    @if($setting->favicon)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Current Favicon" class="h-10 border rounded">
                            <p class="text-sm text-gray-600 mt-1">Current Favicon</p>
                        </div>
                    @endif
                    <input type="file" name="favicon" accept="image/x-icon,image/png"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('favicon') border-red-500 @enderror">
                    <p class="text-sm text-gray-600 mt-1">Accepted formats: ICO, PNG. Max size: 512KB</p>
                    @error('favicon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Colors -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Primary Color <span class="text-red-500">*</span>
                        </label>
                        <input type="color" name="primary_color" value="{{ old('primary_color', $setting->primary_color) }}"
                               class="w-full h-12 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('primary_color') border-red-500 @enderror"
                               required>
                        @error('primary_color')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Secondary Color <span class="text-red-500">*</span>
                        </label>
                        <input type="color" name="secondary_color" value="{{ old('secondary_color', $setting->secondary_color) }}"
                               class="w-full h-12 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('secondary_color') border-red-500 @enderror"
                               required>
                        @error('secondary_color')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Meta Description -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Meta Description
                    </label>
                    <textarea name="meta_description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_description') border-red-500 @enderror">{{ old('meta_description', $setting->meta_description) }}</textarea>
                    @error('meta_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Meta Keywords -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Meta Keywords
                    </label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $setting->meta_keywords) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('meta_keywords') border-red-500 @enderror"
                           placeholder="keyword1, keyword2, keyword3">
                    @error('meta_keywords')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Update Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
