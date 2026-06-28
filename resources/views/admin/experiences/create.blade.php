@extends('layouts.admin')

@section('title', 'Tambah Pekerjaan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.experiences.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Pekerjaan Baru</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.experiences.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @include('admin.experiences.form')
            
            <button type="submit" class="btn btn-primary btn-lg">Simpan Pekerjaan</button>
        </form>
    </div>
</div>
@endsection