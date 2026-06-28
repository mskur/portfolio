<div class="mb-3">
    <label class="form-label fw-semibold">File Gambar</label>
    @if(isset($image) && $image->image)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $image->image) }}" alt="Preview" class="img-thumbnail" style="max-height: 200px;">
        </div>
    @endif
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ isset($image) ? '' : 'required' }}>
    <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar saat mode edit.</div>
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Caption (Opsional)</label>
    <input type="text" name="caption" class="form-control @error('caption') is-invalid @enderror" value="{{ old('caption', $image->caption ?? '') }}">
    @error('caption') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label class="form-label fw-semibold">Urutan Tampil (Sort Order)</label>
    <input type="number" name="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $image->sort_order ?? 0) }}" min="0" required>
    <div class="form-text">Angka lebih kecil akan tampil lebih dulu.</div>
    @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>