@extends('layouts.app')

@section('title', 'Gallery Management')

@section('content')
<div class="w-full mx-auto" x-data="{
    ...tableFilter({
        search: '{{ request('search') }}',
        category: '{{ request('category') }}'
    })
}">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Gallery Management</h2>
                @if(Auth::user()->hasPermission('create_gallery'))
                <a href="{{ route('admin.gallery.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Upload Image
                </a>
                @endif
            </div>
        </div>

        <!-- Table Filter Component -->
        <x-table-filter 
            searchPlaceholder="Search images by title..."
            :showDateRange="false"
        />

        <!-- Grid View -->
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($images as $image)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-900 mb-1 truncate">{{ $image->title }}</h3>
                        @if($image->category)
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 mb-2">
                            {{ $image->category->name }}
                        </span>
                        @endif
                        <div class="flex items-center justify-between mt-2">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $image->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ $image->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            <div class="flex space-x-2">
                                @if(Auth::user()->hasPermission('edit_gallery'))
                                <a href="{{ route('admin.gallery.edit', $image) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endif
                                @if(Auth::user()->hasPermission('delete_gallery'))
                                <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete this image?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <i class="fas fa-images fa-3x mb-3 text-gray-300"></i>
                    <p class="text-gray-500">No images found.</p>
                </div>
                @endforelse
            </div>
        </div>

        @if($images->hasPages())
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $images->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
