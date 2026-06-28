<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nama Perusahaan</label>
        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company', $experience->company ?? '') }}" required>
        @error('company') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Posisi / Jabatan</label>
        <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $experience->position ?? '') }}" required>
        @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tipe Pekerjaan</label>
        <select name="employment_type" class="form-select @error('employment_type') is-invalid @enderror" required>
            <option value="">Pilih Tipe...</option>
            @foreach(['Full-time', 'Part-time', 'Freelance', 'Contract', 'Internship'] as $type)
                <option value="{{ $type }}" @selected(old('employment_type', $experience->employment_type ?? '') == $type)>{{ $type }}</option>
            @endforeach
        </select>
        @error('employment_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Lokasi (Kota / Negara)</label>
        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $experience->location ?? '') }}" required>
        @error('location') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Tanggal Mulai</label>
        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', isset($experience) ? $experience->start_date->format('Y-m-d') : '') }}" required>
        @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Tanggal Selesai</label>
        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', isset($experience) && $experience->end_date ? $experience->end_date->format('Y-m-d') : '') }}">
        @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4 mb-3 d-flex align-items-end pb-2">
        <div class="form-check form-switch">
            <input class="form-check-input border-secondary" type="checkbox" role="switch" name="currently_working" id="currently_working" value="1" @checked(old('currently_working', $experience->currently_working ?? false))>
            <label class="form-check-label fw-bold" for="currently_working">Masih Bekerja di Sini</label>
        </div>
    </div>
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Deskripsi Pekerjaan & Pencapaian</label>
    <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $experience->description ?? '') }}</textarea>
    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label class="form-label fw-semibold">Logo Perusahaan (Opsional)</label>
    @if(isset($experience) && $experience->logo)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $experience->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 100px;">
        </div>
    @endif
    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
    @error('logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const checkbox = document.getElementById('currently_working');
        const endDateInput = document.getElementById('end_date');

        function toggleEndDate() {
            if (checkbox.checked) {
                endDateInput.value = '';
                endDateInput.setAttribute('readonly', true);
                endDateInput.classList.add('bg-light');
            } else {
                endDateInput.removeAttribute('readonly');
                endDateInput.classList.remove('bg-light');
            }
        }

        checkbox.addEventListener('change', toggleEndDate);
        toggleEndDate(); // Run on page load
    });
</script>