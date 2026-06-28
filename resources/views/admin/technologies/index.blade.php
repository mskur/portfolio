@extends('layouts.admin')

@section('title', 'Daftar Teknologi')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Teknologi (Tech Stack)</h2>
    <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">
        + Tambah Teknologi
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3 text-center" style="width: 80px;">Ikon</th>
                        <th class="px-4 py-3">Nama Teknologi</th>
                        <th class="px-4 py-3">Website</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($technologies as $tech)
                    <tr>
                        <td class="px-4 py-3 text-center">
                            @if($tech->icon)
                                <img src="{{ asset('storage/' . $tech->icon) }}" alt="{{ $tech->name }}" class="img-fluid rounded" style="max-height: 40px; object-fit: contain;">
                            @else
                                <div class="bg-light rounded d-inline-flex justify-content-center align-items-center text-muted" style="width: 40px; height: 40px;">
                                    <i class="bi bi-cpu"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 fw-bold text-dark">
                            {{ $tech->name }}
                        </td>
                        <td class="px-4 py-3">
                            @if($tech->website)
                                <a href="{{ $tech->website }}" target="_blank" class="text-decoration-none text-truncate d-inline-block" style="max-width: 250px;">
                                    {{ $tech->website }}
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.technologies.edit', $tech) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.technologies.destroy', $tech) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus teknologi ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-muted">Belum ada data teknologi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection