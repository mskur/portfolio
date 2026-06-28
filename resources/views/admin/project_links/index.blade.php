@extends('layouts.admin')

@section('title', 'Tautan Proyek')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-muted">&larr; Kembali ke Daftar Proyek</a>
    <div class="d-flex justify-content-between align-items-center mt-2">
        <h2 class="fw-bold">Tautan: {{ $project->title }}</h2>
        <a href="{{ route('admin.projects.links.create', $project) }}" class="btn btn-primary">
            + Tambah Tautan
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Tipe</th>
                        <th class="px-4 py-3">Label</th>
                        <th class="px-4 py-3">URL</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($links as $link)
                    <tr>
                        <td class="px-4 py-2 fw-semibold">{{ $link->type }}</td>
                        <td class="px-4 py-2">{{ $link->label }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ $link->url }}" target="_blank" class="text-decoration-none text-truncate d-inline-block" style="max-width: 250px;">
                                {{ $link->url }}
                            </a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.projects.links.edit', [$project, $link]) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.projects.links.destroy', [$project, $link]) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus tautan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada tautan tambahan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection