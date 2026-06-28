<div class="row">
    <div class="col-md-8">
        <div class="mb-3">
            <label class="form-label fw-semibold">Judul Proyek</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title ?? '') }}" required>
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $project->slug ?? '') }}" placeholder="Kosongkan agar dibuat otomatis">
            @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi Singkat</label>
            <textarea name="short_description" rows="2" class="form-control @error('short_description') is-invalid @enderror" required>{{ old('short_description', $project->short_description ?? '') }}</textarea>
            @error('short_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi Lengkap</label>
            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $project->description ?? '') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">URL GitHub</label>
                <input type="url" name="github_url" class="form-control @error('github_url') is-invalid @enderror" value="{{ old('github_url', $project->github_url ?? '') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">URL Live Demo</label>
                <input type="url" name="live_demo" class="form-control @error('live_demo') is-invalid @enderror" value="{{ old('live_demo', $project->live_demo ?? '') }}">
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-light border-0 mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                        <option value="">Pilih Kategori...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $project->category_id ?? '') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                        @foreach(['Completed', 'Development', 'Archived'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $project->status ?? '') == $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="featured" id="featured" value="1" class="form-check-input" @checked(old('featured', $project->featured ?? false))>
                    <label class="form-check-label fw-semibold" for="featured">Tampilkan di Halaman Utama (Featured)</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Peran (Role)</label>
            <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $project->role ?? 'Backend Developer') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tanggal Mulai</label>
                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', isset($project) ? $project->start_date->format('Y-m-d') : '') }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Tanggal Selesai</label>
                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', isset($project) && $project->end_date ? $project->end_date->format('Y-m-d') : '') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Teknologi yang Digunakan</label>
            <div class="border rounded p-3 bg-white" style="max-height: 150px; overflow-y: auto;">
                @php
                    // Ambil array ID teknologi lama dari validasi error, ATAU dari relasi database jika sedang mode edit
                    $selectedTechs = old('technologies', isset($project) ? $project->technologies->pluck('id')->toArray() : []);
                @endphp
                @foreach($technologies as $tech)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $tech->id }}" id="tech{{ $tech->id }}" @checked(in_array($tech->id, $selectedTechs))>
                        <label class="form-check-label" for="tech{{ $tech->id }}">{{ $tech->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Gambar Thumbnail</label>
            @if(isset($project) && $project->thumbnail)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="Thumbnail" class="img-thumbnail" style="max-height: 150px;">
                </div>
            @endif
            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ isset($project) ? '' : 'required' }}>
            <div class="form-text">Biarkan kosong jika tidak ingin mengubah gambar (saat edit).</div>
        </div>
    </div>
</div>