@extends('layouts.admin')

@section('title', 'Riwayat Pendidikan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Riwayat Pendidikan</h2>
    <a href="{{ route('admin.educations.create') }}" class="btn btn-primary">
        + Tambah Pendidikan
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Institusi</th>
                        <th class="px-4 py-3">Gelar & Jurusan</th>
                        <th class="px-4 py-3 text-center">Tahun</th>
                        <th class="px-4 py-3 text-center">GPA</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $edu)
                    <tr>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                @if($edu->logo)
                                    <img src="{{ asset('storage/' . $edu->logo) }}" alt="Logo" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                @else
                                    <div class="bg-secondary rounded me-3 d-flex justify-content-center align-items-center text-white" style="width: 40px; height: 40px;">
                                        <i class="bi bi-building"></i>
                                    </div>
                                @endif
                                <span class="fw-semibold">{{ $edu->institution }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            {{ $edu->degree }} - {{ $edu->major }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            {{ $edu->start_year }} - {{ $edu->end_year ?? 'Sekarang' }}
                        </td>
                        <td class="px-4 py-3 text-center fw-bold text-primary">
                            {{ $edu->gpa ?? '-' }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.educations.edit', $edu) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.educations.destroy', $edu) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus riwayat pendidikan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data riwayat pendidikan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection