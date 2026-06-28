@extends('layouts.admin')

@section('title', 'Tambah Tautan Proyek')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.links.index', $project) }}" class="text-decoration-none text-muted">&larr; Batal</a>
    <h2 class="fw-bold mt-2">Tambah Tautan: {{ $project->title }}</h2>
</div>

<div class="card shadow-sm border-0 col-md-6">
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.links.store', $project) }}" method="POST">
            @csrf
            
            @include('admin.project_links.form')
            
            <button type="submit" class="btn btn-primary">Simpan Tautan</button>
        </form>
    </div>
</div>
@endsection