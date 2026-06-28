@extends('layouts.admin')

@section('title', 'Edit Gambar Galeri')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.images.index', $project) }}" class="text-decoration-none text-muted">&larr; Batal</a>
    <h2 class="fw-bold mt-2">Edit Gambar</h2>
</div>

<div class="card shadow-sm border-0 col-md-6">
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.images.update', [$project, $image]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.project_images.form', ['image' => $image])
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection