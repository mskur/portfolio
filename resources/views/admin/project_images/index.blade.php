@extends('layouts.admin')

@section('title', 'Galeri Proyek')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-muted">&larr; Kembali ke Daftar Proyek</a>
    <div class="d-flex justify-content-between align-items-center mt-2">
        <h2 class="fw-bold">Galeri: {{ $project->title }}</h2>
        <a href="{{ route('admin.projects.images.create', $project) }}" class="btn btn-primary">
            + Tambah Gambar
        </a>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Caption</th>
                        <th class="px-4 py-3">Urutan</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($images as $img)
                    <tr>
                        <td class="px-4 py-2">
                            <img src="{{ asset('storage/' . $img->image) }}" alt="Gallery" class="rounded" style="height: 60px; object-fit: cover;">
                        </td>
                        <td class="px-4 py-2">{{ $img->caption ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $img->sort_order }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('admin.projects.images.edit', [$project, $img]) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.projects.images.destroy', [$project, $img]) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus gambar ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada gambar di galeri ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection