@extends('layouts.admin')

@section('title', 'Manajemen Proyek')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Manajemen Proyek</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        + Tambah Proyek
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Thumbnail</th>
                        <th class="px-4 py-3">Judul Proyek</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumb" class="rounded" style="width: 60px; height: 40px; object-fit: cover;">
                        </td>
                        <td class="px-4 py-2 fw-semibold">
                            {{ $project->title }}
                            @if($project->featured)
                                <span class="badge bg-warning text-dark ms-1">Featured</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $project->category->name }}</td>
                        <td class="px-4 py-2">
                            <span class="badge bg-{{ $project->status == 'Completed' ? 'success' : ($project->status == 'Development' ? 'primary' : 'secondary') }}">
                                {{ $project->status }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.projects.images.index', $project) }}" class="btn btn-sm btn-outline-info me-1" title="Kelola Galeri">Galeri</a>
                            <a href="{{ route('admin.projects.links.index', $project) }}" class="btn btn-sm btn-outline-warning me-1" title="Kelola Tautan">Tautan</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus proyek ini beserta gambarnya?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data proyek.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection