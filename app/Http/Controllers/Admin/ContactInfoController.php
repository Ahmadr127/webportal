<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contact = ContactInfo::getInstance();
        return view('admin.contact-info.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'phone_1' => 'nullable|string|max:20',
            'phone_2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        $contact = ContactInfo::getInstance();
        $contact->update($validated);

        return redirect()->route('admin.contact-info.index')
            ->with('success', 'Contact information updated successfully.');
    }
}
