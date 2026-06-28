<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Http\Requests\CertificateRequest;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        // Mengurutkan berdasarkan tanggal rilis sertifikat terbaru
        $certificates = Certificate::orderBy('issue_date', 'desc')->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(CertificateRequest $request)
    {
        $data = $request->validated();

        // Tangani upload gambar/PDF sertifikat
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates/images', 'public');
        }

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')
                         ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function show(Certificate $certificate)
    {
        // Biasanya untuk panel admin jarang pakai show tunggal, 
        // tapi biarkan saja kosong atau redirect ke index jika tidak terpakai
        return redirect()->route('admin.certificates.index');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(CertificateRequest $request, Certificate $certificate)
    {
        $data = $request->validated();

        // Tangani update gambar/PDF sertifikat
        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($certificate->image && Storage::disk('public')->exists($certificate->image)) {
                Storage::disk('public')->delete($certificate->image);
            }
            // Simpan file baru
            $data['image'] = $request->file('image')->store('certificates/images', 'public');
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')
                         ->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function destroy(Certificate $certificate)
    {
        // Hapus file gambar/PDF dari storage jika ada
        if ($certificate->image && Storage::disk('public')->exists($certificate->image)) {
            Storage::disk('public')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
                         ->with('success', 'Sertifikat berhasil dihapus.');
    }
}