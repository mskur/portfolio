@extends('layouts.admin')

@section('title', 'Tambah Teknologi')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.technologies.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Teknologi Baru</h2>
</div>

<div class="card shadow-sm border-0 col-md-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Teknologi</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Ikon (PNG/SVG/WebP)</label>
                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept=".png,.svg,.webp">
                <div class="form-text">Maksimal ukuran 1MB. Direkomendasikan menggunakan resolusi kotak (1:1).</div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Website / Dokumentasi (Opsional)</label>
                <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder="https://...">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Teknologi</button>
        </form>
    </div>
</div>
@endsection