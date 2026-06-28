@extends('layouts.admin')

@section('title', 'Edit Teknologi')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.technologies.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Edit Teknologi: {{ $technology->name }}</h2>
</div>

<div class="card shadow-sm border-0 col-md-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.technologies.update', $technology) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Teknologi</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $technology->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Ikon (PNG/SVG/WebP)</label>
                
                @if($technology->icon)
                    <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                        <img src="{{ asset('storage/' . $technology->icon) }}" alt="Icon Lama" style="max-height: 50px;">
                    </div>
                @endif
                
                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" accept=".png,.svg,.webp">
                <div class="form-text">Biarkan kosong jika tidak ingin mengubah ikon saat ini.</div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Website / Dokumentasi (Opsional)</label>
                <input type="url" name="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website', $technology->website) }}" placeholder="https://...">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection