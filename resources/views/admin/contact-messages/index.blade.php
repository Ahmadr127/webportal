@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="w-full mx-auto" x-data="{
    ...tableFilter({
        search: '{{ request('search') }}',
        status: '{{ request('status') }}'
    })
}">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900">Contact Messages</h2>
            </div>

            <!-- Status Tabs -->
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <a href="{{ route('admin.contact-messages.index') }}" 
                       class="border-transparent {{ !request('status') ? 'border-green-500 text-green-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        All
                        <span class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium {{ !request('status') ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-900' }}">
                            {{ $newCount + $readCount + $repliedCount }}
                        </span>
                    </a>
                    <a href="?status=new" 
                       class="border-transparent {{ request('status') == 'new' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        New
                        <span class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium {{ request('status') == 'new' ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-900' }}">
                            {{ $newCount }}
                        </span>
                    </a>
                    <a href="?status=read" 
                       class="border-transparent {{ request('status') == 'read' ? 'border-indigo-500 text-indigo-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Read
                        <span class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium {{ request('status') == 'read' ? 'bg-indigo-100 text-indigo-600' : 'bg-gray-100 text-gray-900' }}">
                            {{ $readCount }}
                        </span>
                    </a>
                    <a href="?status=replied" 
                       class="border-transparent {{ request('status') == 'replied' ? 'border-green-500 text-green-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        Replied
                        <span class="ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium {{ request('status') == 'replied' ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-900' }}">
                            {{ $repliedCount }}
                        </span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Table Filter Component -->
        <x-table-filter 
            searchPlaceholder="Search messages by name, email, or subject..."
            :showDateRange="true"
        />

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subject
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Message
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($messages as $message)
                    <tr class="{{ $message->status == 'new' ? 'bg-blue-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $message->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $message->email }}</div>
                            @if($message->phone)
                            <div class="text-sm text-gray-500">{{ $message->phone }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $message->subject }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ Str::limit($message->message, 80) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($message->status == 'new')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">New</span>
                            @elseif($message->status == 'read')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">Read</span>
                            @elseif($message->status == 'replied')
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Replied</span>
                            @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">Archived</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox fa-3x mb-3 text-gray-300"></i>
                            <p>No messages found.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
