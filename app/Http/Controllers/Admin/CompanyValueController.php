<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use Illuminate\Http\Request;

class CompanyValueController extends Controller
{
    public function index()
    {
        $values = CompanyValue::ordered()->paginate(10);
        return view('admin.company-values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.company-values.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        CompanyValue::create($validated);

        return redirect()->route('admin.company-values.index')
            ->with('success', 'Company value created successfully.');
    }

    public function edit(CompanyValue $companyValue)
    {
        return view('admin.company-values.edit', compact('companyValue'));
    }

    public function update(Request $request, CompanyValue $companyValue)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $companyValue->update($validated);

        return redirect()->route('admin.company-values.index')
            ->with('success', 'Company value updated successfully.');
    }

    public function destroy(CompanyValue $companyValue)
    {
        $companyValue->delete();

        return redirect()->route('admin.company-values.index')
            ->with('success', 'Company value deleted successfully.');
    }
}
