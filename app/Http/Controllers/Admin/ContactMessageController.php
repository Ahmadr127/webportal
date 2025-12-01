<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactMessage::with('replier')->latest();

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $messages = $query->paginate(15);
        $newCount = ContactMessage::new()->count();
        $readCount = ContactMessage::read()->count();
        $repliedCount = ContactMessage::replied()->count();

        return view('admin.contact-messages.index', compact('messages', 'newCount', 'readCount', 'repliedCount'));
    }

    public function show(ContactMessage $contactMessage)
    {
        // Mark as read if it's new
        if ($contactMessage->status == 'new') {
            $contactMessage->markAsRead();
        }

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    public function reply(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        // Here you would typically send an email
        // Mail::to($contactMessage->email)->send(new ContactReply($request->reply_message));

        $contactMessage->markAsReplied(Auth::id());

        return back()->with('success', 'Reply sent successfully.');
    }

    public function archive(ContactMessage $contactMessage)
    {
        $contactMessage->archive();

        return back()->with('success', 'Message archived successfully.');
    }

    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:contact_messages,id',
        ]);

        ContactMessage::whereIn('id', $request->ids)->delete();

        return back()->with('success', 'Selected messages deleted successfully.');
    }

    public function bulkArchive(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:contact_messages,id',
        ]);

        ContactMessage::whereIn('id', $request->ids)->update(['status' => 'archived']);

        return back()->with('success', 'Selected messages archived successfully.');
    }
}
