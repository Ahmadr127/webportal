@extends('layouts.app')

@section('title', 'View Message')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Message Details</h1>
        <a href="{{ route('admin.contact-messages.index') }}" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>Back to Inbox
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <!-- Message Content -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                    <h5 class="text-xl font-bold text-white">{{ $contactMessage->subject }}</h5>
                </div>
                <div class="p-6">
                    <div class="mb-4 space-y-2">
                        <p class="text-gray-700">
                            <span class="font-semibold">From:</span> {{ $contactMessage->name }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Email:</span> 
                            <a href="mailto:{{ $contactMessage->email }}" class="text-blue-600 hover:underline">
                                {{ $contactMessage->email }}
                            </a>
                        </p>
                        @if($contactMessage->phone)
                        <p class="text-gray-700">
                            <span class="font-semibold">Phone:</span> {{ $contactMessage->phone }}
                        </p>
                        @endif
                        <p class="text-gray-700">
                            <span class="font-semibold">Date:</span> {{ $contactMessage->created_at->format('d M Y H:i') }}
                        </p>
                        <p class="text-gray-700">
                            <span class="font-semibold">Status:</span>
                            @if($contactMessage->status == 'new')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    New
                                </span>
                            @elseif($contactMessage->status == 'read')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-cyan-100 text-cyan-800">
                                    Read
                                </span>
                            @elseif($contactMessage->status == 'replied')
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Replied
                                </span>
                            @else
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Archived
                                </span>
                            @endif
                        </p>
                    </div>
                    
                    <hr class="my-4 border-gray-200">
                    
                    <div class="message-content">
                        <h6 class="font-semibold text-gray-900 mb-2">Message:</h6>
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
                    </div>

                    @if($contactMessage->status == 'replied' && $contactMessage->replier)
                    <hr class="my-4 border-gray-200">
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <h6 class="font-semibold text-green-800 mb-2">
                            <i class="fas fa-check-circle mr-1"></i> Replied
                        </h6>
                        <p class="text-sm text-gray-700 mb-1">
                            <span class="font-semibold">Replied by:</span> {{ $contactMessage->replier->name }}
                        </p>
                        <p class="text-sm text-gray-700">
                            <span class="font-semibold">Replied at:</span> {{ $contactMessage->replied_at->format('d M Y H:i') }}
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <!-- Actions Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                    <h6 class="text-lg font-bold text-white">Actions</h6>
                </div>
                <div class="p-6 space-y-3">
                    @if($contactMessage->status != 'archived')
                    <form action="{{ route('admin.contact-messages.archive', $contactMessage) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                            <i class="fas fa-archive mr-2"></i>Archive Message
                        </button>
                    </form>
                    @endif

                    @if(Auth::user()->hasPermission('delete_contact_messages'))
                    <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                            <i class="fas fa-trash mr-2"></i>Delete Message
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-gradient-to-r from-blue-600 to-blue-700 border-b">
                    <h6 class="text-lg font-bold text-white">Information</h6>
                </div>
                <div class="p-6 space-y-2">
                    <p class="text-gray-700">
                        <span class="font-semibold">Message ID:</span> #{{ $contactMessage->id }}
                    </p>
                    <p class="text-gray-700">
                        <span class="font-semibold">Received:</span> {{ $contactMessage->created_at->diffForHumans() }}
                    </p>
                    @if($contactMessage->read_at)
                    <p class="text-gray-700">
                        <span class="font-semibold">First Read:</span> {{ $contactMessage->read_at->format('d M Y H:i') }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
