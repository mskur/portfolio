<div class="mb-3">
    <label class="form-label fw-semibold">Tipe Tautan</label>
    <select name="type" class="form-select @error('type') is-invalid @enderror" required>
        <option value="">Pilih Tipe...</option>
        @foreach(['Github', 'Live Demo', 'YouTube', 'Documentation', 'Figma', 'APK'] as $type)
            <option value="{{ $type }}" @selected(old('type', $link->type ?? '') == $type)>{{ $type }}</option>
        @endforeach
    </select>
    @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Label Teks</label>
    <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" value="{{ old('label', $link->label ?? '') }}" placeholder="Contoh: Repository Frontend" required>
    @error('label') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label class="form-label fw-semibold">URL Tujuan</label>
    <input type="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url', $link->url ?? '') }}" placeholder="https://..." required>
    @error('url') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>