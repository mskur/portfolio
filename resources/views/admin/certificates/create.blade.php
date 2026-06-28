@extends('layouts.admin')

@section('title', 'Tambah Sertifikat')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.certificates.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Sertifikat Baru</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @include('admin.certificates.form')
            
            <button type="submit" class="btn btn-primary btn-lg mt-3">Simpan Sertifikat</button>
        </form>
    </div>
</div>
@endsection