@extends('layouts.admin')

@section('title', 'Edit Pendidikan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.educations.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Edit Pendidikan</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.educations.update', $education) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.educations.form', ['education' => $education])
            
            <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection