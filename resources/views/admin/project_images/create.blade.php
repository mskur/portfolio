@extends('layouts.admin')

@section('title', 'Tambah Gambar Galeri')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.images.index', $project) }}" class="text-decoration-none text-muted">&larr; Batal</a>
    <h2 class="fw-bold mt-2">Tambah Gambar: {{ $project->title }}</h2>
</div>

<div class="card shadow-sm border-0 col-md-6">
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.images.store', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @include('admin.project_images.form')
            
            <button type="submit" class="btn btn-primary">Simpan Gambar</button>
        </form>
    </div>
</div>
@endsection