@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.project-categories.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Kategori Baru</h2>
</div>

<div class="card shadow-sm border-0 col-md-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.project-categories.update', $projectCategory) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Kategori</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="$projectCategory->name" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-semibold">Slug (Opsional)</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Dibuat otomatis jika dikosongkan">
                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
        </form>
    </div>
</div>
@endsection