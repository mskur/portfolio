@extends('layouts.admin')

@section('title', 'Edit Tautan Proyek')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.links.index', $project) }}" class="text-decoration-none text-muted">&larr; Batal</a>
    <h2 class="fw-bold mt-2">Edit Tautan</h2>
</div>

<div class="card shadow-sm border-0 col-md-6">
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.links.update', [$project, $link]) }}" method="POST">
            @csrf
            @method('PUT')
            
            @include('admin.project_links.form', ['link' => $link])
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection