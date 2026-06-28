@extends('layouts.admin')

@section('title', 'Edit Keahlian')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.skills.index') }}" class="text-decoration-none text-muted">&larr; Kembali</a>
    <h2 class="fw-bold mt-2">Edit Keahlian: {{ $skill->name }}</h2>
</div>

<div class="card shadow-sm border-0 col-lg-8">
    <div class="card-body p-4">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')
            
            @include('admin.skills.form', ['skill' => $skill])
            
            <button type="submit" class="btn btn-primary btn-lg mt-3">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection