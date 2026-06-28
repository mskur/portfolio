<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Http\Requests\EducationRequest;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan tahun masuk terbaru
        $educations = Education::orderBy('start_year', 'desc')->get();
        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(EducationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('educations/logos', 'public');
        }

        Education::create($data);

        return redirect()->route('admin.educations.index')->with('success', 'Riwayat pendidikan berhasil ditambahkan.');
    }

    public function edit(Education $education)
    {
        return view('admin.educations.edit', compact('education'));
    }

    public function update(EducationRequest $request, Education $education)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($education->logo && Storage::disk('public')->exists($education->logo)) {
                Storage::disk('public')->delete($education->logo);
            }
            $data['logo'] = $request->file('logo')->store('educations/logos', 'public');
        }

        $education->update($data);

        return redirect()->route('admin.educations.index')->with('success', 'Riwayat pendidikan berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        if ($education->logo && Storage::disk('public')->exists($education->logo)) {
            Storage::disk('public')->delete($education->logo);
        }

        $education->delete();

        return redirect()->route('admin.educations.index')->with('success', 'Riwayat pendidikan berhasil dihapus.');
    }
}