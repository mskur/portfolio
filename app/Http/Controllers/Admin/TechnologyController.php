<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Http\Requests\TechnologyRequest;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::latest()->get();
        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(TechnologyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('technologies', 'public');
        }

        Technology::create($data);

        return redirect()->route('admin.technologies.index')->with('success', 'Teknologi berhasil ditambahkan.');
    }

    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(TechnologyRequest $request, Technology $technology)
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            // Hapus gambar lama jika ada
            if ($technology->icon && Storage::disk('public')->exists($technology->icon)) {
                Storage::disk('public')->delete($technology->icon);
            }
            $data['icon'] = $request->file('icon')->store('technologies', 'public');
        }

        $technology->update($data);

        return redirect()->route('admin.technologies.index')->with('success', 'Teknologi berhasil diperbarui.');
    }

    public function destroy(Technology $technology)
    {
        if ($technology->icon && Storage::disk('public')->exists($technology->icon)) {
            Storage::disk('public')->delete($technology->icon);
        }
        
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Teknologi berhasil dihapus.');
    }
}