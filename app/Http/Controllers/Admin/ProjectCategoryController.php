<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Http\Requests\ProjectCategoryRequest;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::latest()->get();
        return view('admin.project_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project_categories.create');
    }

    public function store(ProjectCategoryRequest $request)
    {
        $data = $request->validated();
        
        // Auto-generate slug jika tidak diisi manual
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        ProjectCategory::create($data);

        return redirect()->route('admin.project-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project_categories.edit', compact('projectCategory'));
    }

    public function update(ProjectCategoryRequest $request, ProjectCategory $projectCategory)
    {
        $data = $request->validated();
        
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $projectCategory->update($data);

        return redirect()->route('admin.project-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        // Cek jika kategori masih dipakai oleh project (Restrict delete)
        if ($projectCategory->projects()->count() > 0) {
            return back()->with('error', 'Kategori tidak bisa dihapus karena sedang digunakan oleh proyek.');
        }

        $projectCategory->delete();
        return redirect()->route('admin.project-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}