@extends('layouts.admin')

@section('title', 'Riwayat Pekerjaan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Riwayat Pekerjaan</h2>
    <a href="{{ route('admin.experiences.create') }}" class="btn btn-primary">
        + Tambah Pekerjaan
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Perusahaan</th>
                        <th class="px-4 py-3">Posisi</th>
                        <th class="px-4 py-3 text-center">Durasi</th>
                        <th class="px-4 py-3 text-center">Lokasi</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($experiences as $exp)
                    <tr>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center">
                                @if($exp->logo)
                                    <img src="{{ asset('storage/' . $exp->logo) }}" alt="Logo" class="rounded me-3 bg-white border" style="width: 40px; height: 40px; object-fit: contain;">
                                @else
                                    <div class="bg-secondary rounded me-3 d-flex justify-content-center align-items-center text-white" style="width: 40px; height: 40px;">
                                        <i class="bi bi-briefcase"></i>
                                    </div>
                                @endif
                                <div>
                                    <span class="fw-bold d-block">{{ $exp->company }}</span>
                                    <small class="text-muted">{{ $exp->employment_type }}</small>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 fw-semibold text-primary">
                            {{ $exp->position }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            {{ $exp->start_date->format('M Y') }} - 
                            @if($exp->currently_working)
                                <span class="badge bg-success">Sekarang</span>
                            @else
                                {{ $exp->end_date ? $exp->end_date->format('M Y') : '-' }}
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            {{ $exp->location }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.experiences.edit', $exp) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.experiences.destroy', $exp) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus riwayat pekerjaan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data riwayat pekerjaan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection