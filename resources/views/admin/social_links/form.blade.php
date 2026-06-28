<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Platform</label>
        <input type="text" name="platform" class="form-control @error('platform') is-invalid @enderror" value="{{ old('platform', $social_link->platform ?? '') }}" required placeholder="Contoh: GitHub, LinkedIn, Instagram">
        @error('platform') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Urutan Tampil (Sort Order)</label>
        <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $social_link->sort_order ?? 0) }}" min="0" required>
        <div class="form-text">Angka lebih kecil akan tampil lebih dulu (Misal: 0, 1, 2).</div>
        @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">URL Profile / Link</label>
    <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $social_link->url ?? '') }}" required placeholder="Contoh: https://github.com/username">
    @error('url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Icon Class (Opsional)</label>
    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $social_link->icon ?? '') }}" placeholder="Contoh: bi bi-github atau fa-brands fa-linkedin">
    <div class="form-text">Masukkan class icon dari Bootstrap Icons (bi) atau FontAwesome (fa).</div>
    @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>