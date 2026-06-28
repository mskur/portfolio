@extends('layouts.admin')

@section('title', 'Site Settings')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Pengaturan Website</h2>
    <p class="text-muted">Atur tampilan beranda, warna, dan identitas website portofoliomu.</p>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold py-3">Teks & Identitas Utama</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Website / Site Name</label>
                        <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings->site_name) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Hero Title (Teks Besar di Beranda)</label>
                        <input type="text" name="hero_title" class="form-control" value="{{ old('hero_title', $settings->hero_title) }}" placeholder="Hi, I'm..." required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hero Subtitle</label>
                        <textarea name="hero_subtitle" rows="2" class="form-control" required>{{ old('hero_subtitle', $settings->hero_subtitle) }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Teks About (Footer/Singkat)</label>
                        <textarea name="about" rows="3" class="form-control" required>{{ old('about', $settings->about) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teks Copyright Footer</label>
                        <input type="text" name="footer" class="form-control" value="{{ old('footer', $settings->footer) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white fw-bold py-3">Branding & Visual</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Logo Web (Navbar)</label>
                        @if($settings->logo)
                            <div class="mb-2 bg-dark p-2 rounded text-center">
                                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" style="max-height: 40px;">
                            </div>
                        @endif
                        <input type="file" name="logo" class="form-control form-control-sm" accept=".png,.svg,.webp">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Favicon (Ikon Tab Browser)</label>
                        @if($settings->favicon)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $settings->favicon) }}" alt="Favicon" style="max-height: 32px;">
                            </div>
                        @endif
                        <input type="file" name="favicon" class="form-control form-control-sm" accept=".ico,.png">
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label class="form-label">Primary Color (Hex)</label>
                        <input type="color" name="primary_color" class="form-control form-control-color w-100" value="{{ old('primary_color', $settings->primary_color ?? '#0d6efd') }}">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Secondary Color (Hex)</label>
                        <input type="color" name="secondary_color" class="form-control form-control-color w-100" value="{{ old('secondary_color', $settings->secondary_color ?? '#212529') }}">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm">Simpan Pengaturan</button>
        </div>
    </div>
</form>
@endsection