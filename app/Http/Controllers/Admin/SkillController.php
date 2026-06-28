<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

class SkillController extends Controller
{
    public function index()
    {
        // Mengurutkan berdasarkan kategori lalu level tertinggi
        $skills = Skill::orderBy('category')->orderBy('level', 'desc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(SkillRequest $request)
    {
        Skill::create($request->validated());
        return redirect()->route('admin.skills.index')
                         ->with('success', 'Keahlian berhasil ditambahkan.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return redirect()->route('admin.skills.index')
                         ->with('success', 'Keahlian berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')
                         ->with('success', 'Keahlian berhasil dihapus.');
    }
}