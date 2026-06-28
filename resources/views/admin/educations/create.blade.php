@extends('layouts.admin')

@section('title', 'Tambah Pendidikan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.educations.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Tambah Pendidikan Baru</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.educations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @include('admin.educations.form')
            
            <button type="submit" class="btn btn-primary btn-lg">Simpan Pendidikan</button>
        </form>
    </div>
</div>
@endsection