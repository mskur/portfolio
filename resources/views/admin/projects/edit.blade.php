@extends('layouts.admin')

@section('title', 'Edit Proyek')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Edit Proyek: {{ $project->title }}</h2>
</div>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    @include('admin.projects.form', ['project' => $project])
    
    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-lg px-5">Simpan Perubahan</button>
    </div>
</form>
@endsection