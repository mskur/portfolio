<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Http\Requests\ProjectImageRequest;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    public function index(Project $project)
    {
        $images = $project->images()->orderBy('sort_order')->get();
        return view('admin.project_images.index', compact('project', 'images'));
    }

    public function create(Project $project)
    {
        return view('admin.project_images.create', compact('project'));
    }

    public function store(ProjectImageRequest $request, Project $project)
    {
        $data = $request->validated();
        
        // Cek manual jika image kosong saat create (karena di Request diset nullable untuk update)
        if (!$request->hasFile('image')) {
            return back()->withInput()->withErrors(['image' => 'Gambar wajib diunggah.']);
        }

        $data['project_id'] = $project->id;
        $data['image'] = $request->file('image')->store('projects/gallery', 'public');

        ProjectImage::create($data);

        return redirect()->route('admin.projects.images.index', $project)->with('success', 'Gambar galeri berhasil ditambahkan.');
    }

    public function edit(Project $project, ProjectImage $image)
    {
        return view('admin.project_images.edit', compact('project', 'image'));
    }

    public function update(ProjectImageRequest $request, Project $project, ProjectImage $image)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($image->image && Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
            $data['image'] = $request->file('image')->store('projects/gallery', 'public');
        }

        $image->update($data);

        return redirect()->route('admin.projects.images.index', $project)->with('success', 'Gambar galeri berhasil diperbarui.');
    }

    public function destroy(Project $project, ProjectImage $image)
    {
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return redirect()->route('admin.projects.images.index', $project)->with('success', 'Gambar galeri berhasil dihapus.');
    }
}