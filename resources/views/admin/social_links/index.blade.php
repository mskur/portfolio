@extends('layouts.admin')

@section('title', 'Tautan Sosial')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Tautan Sosial (Social Links)</h2>
    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">
        + Tambah Tautan
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3 text-center" style="width: 80px;">Urutan</th>
                        <th class="px-4 py-3">Platform</th>
                        <th class="px-4 py-3 text-center">Icon</th>
                        <th class="px-4 py-3">URL</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($socialLinks as $link)
                    <tr>
                        <td class="px-4 py-3 text-center fw-bold text-muted">
                            {{ $link->sort_order }}
                        </td>
                        <td class="px-4 py-3 fw-bold text-dark">
                            {{ $link->platform }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($link->icon)
                                <i class="{{ $link->icon }} fs-4 text-primary"></i>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ $link->url }}" target="_blank" class="text-decoration-none text-truncate d-inline-block" style="max-width: 250px;">
                                {{ $link->url }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.social-links.edit', $link) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.social-links.destroy', $link) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus tautan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data tautan sosial.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection