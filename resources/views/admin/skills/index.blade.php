@extends('layouts.admin')

@section('title', 'Daftar Keahlian')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Keahlian (Skills)</h2>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">
        + Tambah Keahlian
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Nama Keahlian</th>
                        <th class="px-4 py-3 text-center">Level</th>
                        <th class="px-4 py-3 text-center">Icon</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($skills as $skill)
                    <tr>
                        <td class="px-4 py-3 fw-semibold text-secondary">
                            {{ $skill->category }}
                        </td>
                        <td class="px-4 py-3 fw-bold text-dark">
                            {{ $skill->name }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="progress w-100 me-2" style="height: 10px; max-width: 150px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $skill->level }}%;" aria-valuenow="{{ $skill->level }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="fw-bold">{{ $skill->level }}%</small>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($skill->icon)
                                <i class="{{ $skill->icon }} fs-4 text-primary"></i>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus keahlian ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data keahlian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection