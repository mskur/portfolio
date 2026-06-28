@extends('layouts.admin')

@section('title', 'Pengaturan Profil')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Pengaturan Profil</h2>
    <p class="text-muted">Kelola informasi data diri, kontak, dan CV yang akan tampil di website portofoliomu.</p>
</div>

<form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold py-3">Informasi Utama</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name', $profile->full_name) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Profesi / Pekerjaan</label>
                            <input type="text" name="profession" class="form-control @error('profession') is-invalid @enderror" value="{{ old('profession', $profile->profession) }}" placeholder="e.g. Junior Backend Developer" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Headline (Moto / Slogan Pendek)</label>
                        <input type="text" name="headline" class="form-control @error('headline') is-invalid @enderror" value="{{ old('headline', $profile->headline) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bio (Tentang Saya)</label>
                        <textarea name="bio" rows="5" class="form-control @error('bio') is-invalid @enderror" required>{{ old('bio', $profile->bio) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold py-3">Informasi Kontak & Lokasi</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email Publik</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor Telepon / WA</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $profile->phone) }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kota</label>
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $profile->city) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Provinsi</label>
                            <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" value="{{ old('province', $profile->province) }}" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Negara</label>
                            <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $profile->country ?? 'Indonesia') }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold py-3">Foto & Dokumen</div>
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <label class="form-label d-block text-start">Foto Profil</label>
                        @if($profile->photo)
                            <img src="{{ asset('storage/' . $profile->photo) }}" alt="Photo" class="rounded-circle mb-3 object-fit-cover shadow-sm" style="width: 150px; height: 150px;">
                        @else
                            <div class="rounded-circle bg-secondary d-inline-flex justify-content-center align-items-center text-white mb-3 shadow-sm" style="width: 150px; height: 150px; font-size: 3rem;">
                                <i class="bi bi-person"></i>
                            </div>
                        @endif
                        <input type="file" name="photo" class="form-control form-control-sm @error('photo') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">File CV (PDF)</label>
                        @if($profile->cv)
                            <div class="mb-2">
                                <a href="{{ asset('storage/' . $profile->cv) }}" target="_blank" class="btn btn-sm btn-outline-danger w-100">
                                    Lihat CV Saat Ini
                                </a>
                            </div>
                        @endif
                        <input type="file" name="cv" class="form-control form-control-sm @error('cv') is-invalid @enderror" accept=".pdf">
                        <div class="form-text">Maksimal ukuran 2MB.</div>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">Simpan Profil</button>
        </div>
    </div>
</form>
@endsection