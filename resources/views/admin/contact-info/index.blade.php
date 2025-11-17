@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                <h2 class="text-2xl font-bold text-white">Contact Information</h2>
            </div>

            @if(session('success'))
                <div class="mx-6 mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.contact-info.update') }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <!-- Phone Numbers -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Phone 1
                        </label>
                        <input type="text" name="phone_1" value="{{ old('phone_1', $contact->phone_1) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone_1') border-red-500 @enderror">
                        @error('phone_1')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Phone 2
                        </label>
                        <input type="text" name="phone_2" value="{{ old('phone_2', $contact->phone_2) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('phone_2') border-red-500 @enderror">
                        @error('phone_2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email & WhatsApp -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            WhatsApp
                        </label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('whatsapp') border-red-500 @enderror"
                               placeholder="628123456789">
                        @error('whatsapp')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Address
                    </label>
                    <textarea name="address" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address', $contact->address) }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Social Media -->
                <h3 class="text-lg font-bold text-gray-800 mb-4 mt-8">Social Media</h3>
                
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Facebook URL
                        </label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $contact->facebook_url) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('facebook_url') border-red-500 @enderror"
                               placeholder="https://facebook.com/yourpage">
                        @error('facebook_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Instagram URL
                        </label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $contact->instagram_url) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('instagram_url') border-red-500 @enderror"
                               placeholder="https://instagram.com/yourpage">
                        @error('instagram_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Twitter URL
                        </label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $contact->twitter_url) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('twitter_url') border-red-500 @enderror"
                               placeholder="https://twitter.com/yourpage">
                        @error('twitter_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            LinkedIn URL
                        </label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $contact->linkedin_url) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('linkedin_url') border-red-500 @enderror"
                               placeholder="https://linkedin.com/company/yourpage">
                        @error('linkedin_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        YouTube URL
                    </label>
                    <input type="url" name="youtube_url" value="{{ old('youtube_url', $contact->youtube_url) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('youtube_url') border-red-500 @enderror"
                           placeholder="https://youtube.com/c/yourchannel">
                    @error('youtube_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                        Update Contact Info
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
