<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Http\Requests\ExperienceRequest;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(ExperienceRequest $request)
    {
        $data = $request->validated();

        // Tangani Checkbox "Masih Bekerja"
        $data['currently_working'] = $request->has('currently_working');
        if ($data['currently_working']) {
            $data['end_date'] = null; // Pastikan kosong jika masih bekerja
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('experiences/logos', 'public');
        }

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Riwayat pekerjaan berhasil ditambahkan.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(ExperienceRequest $request, Experience $experience)
    {
        $data = $request->validated();

        $data['currently_working'] = $request->has('currently_working');
        if ($data['currently_working']) {
            $data['end_date'] = null;
        }

        if ($request->hasFile('logo')) {
            if ($experience->logo && Storage::disk('public')->exists($experience->logo)) {
                Storage::disk('public')->delete($experience->logo);
            }
            $data['logo'] = $request->file('logo')->store('experiences/logos', 'public');
        }

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Riwayat pekerjaan berhasil diperbarui.');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->logo && Storage::disk('public')->exists($experience->logo)) {
            Storage::disk('public')->delete($experience->logo);
        }

        $experience->delete();

        return redirect()->route('admin.experiences.index')->with('success', 'Riwayat pekerjaan berhasil dihapus.');
    }
}