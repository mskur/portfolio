<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Institusi / Universitas</label>
        <input type="text" name="institution" class="form-control @error('institution') is-invalid @enderror" value="{{ old('institution', $education->institution ?? '') }}" required>
        @error('institution') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Gelar (Degree)</label>
        <input type="text" name="degree" class="form-control @error('degree') is-invalid @enderror" value="{{ old('degree', $education->degree ?? '') }}" placeholder="Contoh: S1, D3" required>
        @error('degree') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">GPA / IPK</label>
        <input type="number" step="0.01" min="0" max="4" name="gpa" class="form-control @error('gpa') is-invalid @enderror" value="{{ old('gpa', $education->gpa ?? '') }}">
        @error('gpa') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Jurusan (Major)</label>
        <input type="text" name="major" class="form-control @error('major') is-invalid @enderror" value="{{ old('major', $education->major ?? '') }}" required>
        @error('major') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Tahun Masuk</label>
        <input type="number" name="start_year" class="form-control @error('start_year') is-invalid @enderror" value="{{ old('start_year', $education->start_year ?? date('Y')) }}" required>
        @error('start_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Tahun Lulus</label>
        <input type="number" name="end_year" class="form-control @error('end_year') is-invalid @enderror" value="{{ old('end_year', $education->end_year ?? '') }}" placeholder="Kosongkan jika belum">
        @error('end_year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi / Pencapaian (Opsional)</label>
    <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $education->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label class="form-label fw-semibold">Logo Institusi (Opsional)</label>
    @if(isset($education) && $education->logo)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $education->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 100px;">
        </div>
    @endif
    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
    <div class="form-text">Bisa menggunakan format JPG, PNG, atau WebP.</div>
    @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>