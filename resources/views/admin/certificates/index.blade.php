@extends('layouts.admin')

@section('title', 'Daftar Sertifikat')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Sertifikat & Lisensi</h2>
    <a href="{{ route('admin.certificates.create') }}" class="btn btn-primary">
        + Tambah Sertifikat
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3">Nama Sertifikat & Penerbit</th>
                        <th class="px-4 py-3 text-center">Tanggal Terbit</th>
                        <th class="px-4 py-3 text-center">Kredensial</th>
                        <th class="px-4 py-3 text-center">Bukti</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($certificates as $cert)
                    <tr>
                        <td class="px-4 py-3">
                            <span class="fw-bold d-block text-dark">{{ $cert->title }}</span>
                            <small class="text-muted">Penerbit: <strong>{{ $cert->issuer }}</strong></small>
                        </td>
                        <td class="px-4 py-3 text-center">
                            {{ $cert->issue_date->format('M Y') }} - 
                            @if($cert->expire_date)
                                {{ $cert->expire_date->format('M Y') }}
                            @else
                                <span class="badge bg-success">Seumur Hidup</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($cert->credential_id)
                                <small class="d-block text-muted">ID: {{ $cert->credential_id }}</small>
                            @endif
                            @if($cert->credential_url)
                                <a href="{{ $cert->credential_url }}" target="_blank" class="btn btn-sm btn-link p-0 text-decoration-none">
                                    Lihat Kredensial &rarr;
                                </a>
                            @elseif(!$cert->credential_id && !$cert->credential_url)
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($cert->image)
                                <a href="{{ asset('storage/' . $cert->image) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                    Lihat Lampiran
                                </a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.certificates.edit', $cert) }}" class="btn btn-sm btn-outline-secondary me-1">Edit</a>
                            <form action="{{ route('admin.certificates.destroy', $cert) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus sertifikat ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data sertifikat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection