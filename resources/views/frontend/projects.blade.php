@extends('layouts.frontend')

@section('title', 'All Projects')

@section('content')
<div class="container py-5 mt-5">
    <div class="text-center mb-5 pb-3" data-aos="fade-down">
        <span class="text-primary fw-bold text-uppercase tracking-wider small">Catalog</span>
        <h1 class="display-5 fw-bold mt-2 text-dark">All My Projects</h1>
        <div class="mx-auto bg-primary rounded-pill mt-3" style="width: 60px; height: 5px;"></div>
    </div>

    <div class="row g-4 mb-5">
        @forelse($projects as $index => $project)
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
            <div class="card h-100 border-0 bg-white shadow-sm rounded-4 overflow-hidden text-start">
                <div class="position-relative overflow-hidden bg-light d-flex justify-content-center align-items-center" style="height: 250px;">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" class="card-img-top transition-transform w-100 h-100" alt="{{ $project->title }}" style="object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <i class="bi bi-image text-secondary opacity-25" style="font-size: 5rem; display: none;"></i>
                    <div class="position-absolute top-0 start-0 m-3">
                        <span class="badge bg-white text-primary shadow-sm rounded-pill px-3 py-2 fw-semibold border">
                            {{ $project->category->name ?? 'Uncategorized' }}
                        </span>
                    </div>
                </div>

                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-3">
                        <a href="{{ route('project.detail', $project->slug) }}" class="text-dark text-decoration-none stretched-link">{{ $project->title }}</a>
                    </h4>
                    <p class="card-text text-muted" style="line-height: 1.7;">
                        {{ Str::limit($project->short_description, 110) }}
                    </p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h4 class="text-muted">No projects published yet.</h4>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection