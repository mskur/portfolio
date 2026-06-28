@extends('layouts.admin')

@section('title', 'Edit Pekerjaan')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.experiences.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Edit Pekerjaan: {{ $experience->company }}</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            @include('admin.experiences.form', ['experience' => $experience])
            
            <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection