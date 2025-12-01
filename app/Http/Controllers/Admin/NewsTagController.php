<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsTagController extends Controller
{
    public function index()
    {
        $tags = NewsTag::withCount('news')->latest()->paginate(10);
        return view('admin.news-tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.news-tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:news_tags,slug',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        NewsTag::create($validated);

        return redirect()->route('admin.news-tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function edit(NewsTag $newsTag)
    {
        return view('admin.news-tags.edit', compact('newsTag'));
    }

    public function update(Request $request, NewsTag $newsTag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:news_tags,slug,' . $newsTag->id,
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $newsTag->update($validated);

        return redirect()->route('admin.news-tags.index')
            ->with('success', 'Tag updated successfully.');
    }

    public function destroy(NewsTag $newsTag)
    {
        $newsTag->delete();
        return redirect()->route('admin.news-tags.index')
            ->with('success', 'Tag deleted successfully.');
    }
}
