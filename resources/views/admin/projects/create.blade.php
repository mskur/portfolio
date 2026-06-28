@extends('layouts.admin')

@section('title', 'Tambah Proyek')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Proyek Baru</h2>
</div>

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @include('admin.projects.form')
    
    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-lg px-5">Simpan Proyek</button>
    </div>
</form>
@endsection