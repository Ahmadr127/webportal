@extends('layouts.app')

@section('title', 'View Message')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Message Details</h1>
        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Inbox
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <!-- Message Content -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">{{ $contactMessage->subject }}</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <p class="mb-1"><strong>From:</strong> {{ $contactMessage->name }}</p>
                        <p class="mb-1"><strong>Email:</strong> <a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></p>
                        @if($contactMessage->phone)
                        <p class="mb-1"><strong>Phone:</strong> {{ $contactMessage->phone }}</p>
                        @endif
                        <p class="mb-1"><strong>Date:</strong> {{ $contactMessage->created_at->format('d M Y H:i') }}</p>
                        <p class="mb-0">
                            <strong>Status:</strong>
                            @if($contactMessage->status == 'new')
                            <span class="badge badge-primary">New</span>
                            @elseif($contactMessage->status == 'read')
                            <span class="badge badge-info">Read</span>
                            @elseif($contactMessage->status == 'replied')
                            <span class="badge badge-success">Replied</span>
                            @else
                            <span class="badge badge-secondary">Archived</span>
                            @endif
                        </p>
                    </div>
                    <hr>
                    <div class="message-content">
                        <h6>Message:</h6>
                        <p style="white-space: pre-wrap;">{{ $contactMessage->message }}</p>
                    </div>

                    @if($contactMessage->status == 'replied' && $contactMessage->replier)
                    <hr>
                    <div class="alert alert-success">
                        <h6><i class="fas fa-check-circle"></i> Replied</h6>
                        <p class="mb-0"><strong>Replied by:</strong> {{ $contactMessage->replier->name }}</p>
                        <p class="mb-0"><strong>Replied at:</strong> {{ $contactMessage->replied_at->format('d M Y H:i') }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Reply Form -->
            @if($contactMessage->status != 'replied' && Auth::user()->hasPermission('reply_contact_messages'))
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reply to Message</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact-messages.reply', $contactMessage) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="reply_message">Your Reply</label>
                            <textarea name="reply_message" id="reply_message" class="form-control @error('reply_message') is-invalid @enderror" 
                                      rows="5" required placeholder="Type your reply here..."></textarea>
                            @error('reply_message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">This will be sent to {{ $contactMessage->email }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Send Reply
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>

        <div class="col-lg-4">
            <!-- Actions Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                </div>
                <div class="card-body">
                    @if($contactMessage->status != 'archived')
                    <form action="{{ route('admin.contact-messages.archive', $contactMessage) }}" method="POST" class="mb-2">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-block">
                            <i class="fas fa-archive"></i> Archive Message
                        </button>
                    </form>
                    @endif

                    @if(Auth::user()->hasPermission('delete_contact_messages'))
                    <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash"></i> Delete Message
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <!-- Info Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                </div>
                <div class="card-body">
                    <p class="mb-2"><strong>Message ID:</strong> #{{ $contactMessage->id }}</p>
                    <p class="mb-2"><strong>Received:</strong> {{ $contactMessage->created_at->diffForHumans() }}</p>
                    @if($contactMessage->read_at)
                    <p class="mb-0"><strong>First Read:</strong> {{ $contactMessage->read_at->format('d M Y H:i') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
