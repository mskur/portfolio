@extends('layouts.admin')

@section('title', 'Edit Sertifikat')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.certificates.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Edit Sertifikat: {{ $certificate->title }}</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.certificates.form', ['certificate' => $certificate])
            
            <button type="submit" class="btn btn-primary btn-lg mt-3">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection