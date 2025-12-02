<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutContentController extends Controller
{
    public function index()
    {
        $sections = AboutSection::ordered()->paginate(10);
        return view('admin.about-content.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.about-content.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_key' => 'required|string|max:255|unique:about_sections,section_key',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        AboutSection::create($validated);

        return redirect()->route('admin.about-content.index')
            ->with('success', 'About section created successfully.');
    }

    public function edit(AboutSection $aboutContent)
    {
        return view('admin.about-content.edit', compact('aboutContent'));
    }

    public function update(Request $request, AboutSection $aboutContent)
    {
        $validated = $request->validate([
            'section_key' => 'required|string|max:255|unique:about_sections,section_key,' . $aboutContent->id,
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($aboutContent->image) {
                Storage::disk('public')->delete($aboutContent->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $aboutContent->update($validated);

        return redirect()->route('admin.about-content.index')
            ->with('success', 'About section updated successfully.');
    }

    public function destroy(AboutSection $aboutContent)
    {
        if ($aboutContent->image) {
            Storage::disk('public')->delete($aboutContent->image);
        }

        $aboutContent->delete();

        return redirect()->route('admin.about-content.index')
            ->with('success', 'About section deleted successfully.');
    }
}
