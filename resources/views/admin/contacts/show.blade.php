@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <a href="{{ route('admin.contacts.index') }}" class="text-decoration-none text-muted">&larr; Kembali ke Kotak Masuk</a>
        <h2 class="fw-bold mt-2">Detail Pesan</h2>
    </div>
    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger shadow-sm">
            <i class="bi bi-trash me-1"></i> Hapus Pesan
        </button>
    </form>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold mb-0 text-dark">{{ $contact->subject }}</h5>
    </div>
    <div class="card-body p-4 bg-light">
        <div class="d-flex justify-content-between align-items-start mb-4 pb-3 border-bottom">
            <div class="d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center fw-bold fs-4 me-3" style="width: 50px; height: 50px;">
                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                </div>
                <div>
                    <h6 class="fw-bold mb-0">{{ $contact->name }}</h6>
                    <a href="mailto:{{ $contact->email }}" class="text-decoration-none">{{ $contact->email }}</a>
                </div>
            </div>
            <div class="text-end text-muted">
                <small class="d-block">{{ $contact->created_at->format('d M Y') }}</small>
                <small>{{ $contact->created_at->format('H:i') }} WIB</small>
            </div>
        </div>

        <div class="px-2" style="white-space: pre-wrap; font-size: 1.05rem; line-height: 1.6;">{{ $contact->message }}</div>
        
        <div class="mt-5 pt-3">
            <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}" class="btn btn-primary">
                <i class="bi bi-reply me-1"></i> Balas via Email
            </a>
        </div>
    </div>
</div>
@endsection