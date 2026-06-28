<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Sertifikat / Kursus</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $certificate->title ?? '') }}" required placeholder="Contoh: Profesional Laravel Developer">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Organisasi Penerbit (Issuer)</label>
        <input type="text" name="issuer" class="form-control @error('issuer') is-invalid @enderror" value="{{ old('issuer', $certificate->issuer ?? '') }}" required placeholder="Contoh: Dicoding, Udemy, Coursera">
        @error('issuer') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tanggal Terbit</label>
        <input type="date" name="issue_date" class="form-control @error('issue_date') is-invalid @enderror" value="{{ old('issue_date', isset($certificate) ? $certificate->issue_date->format('Y-m-d') : '') }}" required>
        @error('issue_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tanggal Kadaluarsa (Opsional)</label>
        <input type="date" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror" value="{{ old('expire_date', isset($certificate) && $certificate->expire_date ? $certificate->expire_date->format('Y-m-d') : '') }}">
        <div class="form-text">Kosongkan jika sertifikat berlaku seumur hidup.</div>
        @error('expire_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">ID Kredensial (Opsional)</label>
        <input type="text" name="credential_id" class="form-control @error('credential_id') is-invalid @enderror" value="{{ old('credential_id', $certificate->credential_id ?? '') }}" placeholder="Contoh: CERT-12345">
        @error('credential_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">URL Kredensial (Opsional)</label>
        <input type="url" name="credential_url" class="form-control @error('credential_url') is-invalid @enderror" value="{{ old('credential_url', $certificate->credential_url ?? '') }}" placeholder="Contoh: https://penerbit.com/verify/xyz">
        @error('credential_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">File / Gambar Sertifikat (Opsional)</label>
    
    {{-- Logika Preview File Lama --}}
    @if(isset($certificate) && $certificate->image)
        <div class="mb-3 p-2 border rounded bg-light d-flex align-items-center" style="max-width: 300px;">
            @if(Str::endsWith($certificate->image, '.pdf'))
                <div class="me-3 fs-3 text-danger"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                <div>
                    <small class="d-block fw-bold text-muted">File Terlampir (PDF)</small>
                    <a href="{{ asset('storage/' . $certificate->image) }}" target="_blank" class="btn btn-xs btn-link p-0 text-decoration-none">Buka PDF Lama &rarr;</a>
                </div>
            @else
                <img src="{{ asset('storage/' . $certificate->image) }}" alt="Sertifikat" class="img-thumbnail me-3" style="max-height: 70px; object-fit: cover;">
                <div>
                    <small class="d-block fw-bold text-muted">Gambar Terlampir</small>
                    <a href="{{ asset('storage/' . $certificate->image) }}" target="_blank" class="btn btn-xs btn-link p-0 text-decoration-none">Perbesar &rarr;</a>
                </div>
            @endif
        </div>
    @endif
    
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
    <div class="form-text">Mendukung format JPG, PNG, atau PDF (Maks. 2MB).</div>
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>