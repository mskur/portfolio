<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Keahlian</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $skill->name ?? '') }}" required placeholder="Contoh: Laravel">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Kategori</label>
        <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $skill->category ?? '') }}" required placeholder="Contoh: Backend, Frontend, Tools">
        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Level Penguasaan (0-100)</label>
        <div class="input-group has-validation">
            <input type="number" name="level" class="form-control @error('level') is-invalid @enderror" value="{{ old('level', $skill->level ?? '') }}" min="0" max="100" required>
            <span class="input-group-text">%</span>
            @error('level') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Icon (Opsional)</label>
        <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon', $skill->icon ?? '') }}" placeholder="Contoh: fa-brands fa-laravel">
        <div class="form-text">Gunakan class FontAwesome (misal: <code>fa-brands fa-php</code>).</div>
        @error('icon') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>