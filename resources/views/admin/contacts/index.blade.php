@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Pesan Masuk (Kontak)</h2>
    <p class="text-muted">Daftar pesan dari pengunjung website portofoliomu.</p>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="px-4 py-3 text-center" style="width: 50px;">Status</th>
                        <th class="px-4 py-3">Pengirim</th>
                        <th class="px-4 py-3">Subjek</th>
                        <th class="px-4 py-3 text-center">Tanggal</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                    <tr class="{{ $msg->is_read ? 'bg-transparent' : 'bg-light' }}">
                        <td class="px-4 py-3 text-center">
                            @if($msg->is_read)
                                <i class="bi bi-envelope-open text-muted fs-5" title="Sudah Dibaca"></i>
                            @else
                                <i class="bi bi-envelope-fill text-primary fs-5" title="Belum Dibaca"></i>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span class="d-block text-dark {{ $msg->is_read ? '' : 'fw-bold' }}">{{ $msg->name }}</span>
                            <small class="text-muted">{{ $msg->email }}</small>
                        </td>
                        <td class="px-4 py-3 text-truncate" style="max-width: 250px;">
                            <span class="{{ $msg->is_read ? 'text-secondary' : 'fw-bold text-dark' }}">
                                {{ $msg->subject }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <small class="text-muted">{{ $msg->created_at->format('d M Y, H:i') }}</small>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.contacts.show', $msg) }}" class="btn btn-sm btn-outline-primary me-1">Buka</a>
                            <form action="{{ route('admin.contacts.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 opacity-50"></i>
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection