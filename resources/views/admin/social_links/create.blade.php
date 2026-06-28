@extends('layouts.admin')

@section('title', 'Tambah Tautan Sosial')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.social-links.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Tautan Sosial</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.social-links.store') }}" method="POST">
            @csrf
            
            @include('admin.social_links.form')
            
            <button type="submit" class="btn btn-primary btn-lg mt-3">Simpan Tautan</button>
        </form>
    </div>
</div>
@endsection