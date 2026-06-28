<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Http\Requests\ProjectLinkRequest;

class ProjectLinkController extends Controller
{
    public function index(Project $project)
    {
        $links = $project->links()->latest()->get();
        return view('admin.project_links.index', compact('project', 'links'));
    }

    public function create(Project $project)
    {
        return view('admin.project_links.create', compact('project'));
    }

    public function store(ProjectLinkRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['project_id'] = $project->id;

        ProjectLink::create($data);

        return redirect()->route('admin.projects.links.index', $project)->with('success', 'Tautan proyek berhasil ditambahkan.');
    }

    public function edit(Project $project, ProjectLink $link)
    {
        return view('admin.project_links.edit', compact('project', 'link'));
    }

    public function update(ProjectLinkRequest $request, Project $project, ProjectLink $link)
    {
        $link->update($request->validated());

        return redirect()->route('admin.projects.links.index', $project)->with('success', 'Tautan proyek berhasil diperbarui.');
    }

    public function destroy(Project $project, ProjectLink $link)
    {
        $link->delete();

        return redirect()->route('admin.projects.links.index', $project)->with('success', 'Tautan proyek berhasil dihapus.');
    }
}