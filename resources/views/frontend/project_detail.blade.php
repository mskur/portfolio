@extends('layouts.frontend')

@section('title', $project->title)

@section('content')
<div class="container py-5 mt-5">
    <nav aria-label="breadcrumb" class="mb-5" data-aos="fade-down">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}" class="text-decoration-none text-muted">Projects</a></li>
            <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">{{ $project->title }}</li>
        </ol>
    </nav>

    <div class="row mb-5 g-5">
        <div class="col-lg-7" data-aos="fade-right">
            <h1 class="display-4 fw-bold mb-3 text-dark">{{ $project->title }}</h1>
            <p class="lead text-muted mb-4" style="line-height: 1.8;">{{ $project->short_description }}</p>
            
            <div class="d-flex flex-wrap gap-2 mb-4">
                @foreach($project->technologies as $tech)
                    <span class="badge bg-white text-dark border shadow-sm px-3 py-2 rounded-pill fw-medium d-flex align-items-center">
                        @if($tech->icon)
                            <img src="{{ asset('storage/' . $tech->icon) }}" alt="{{ $tech->name }}" style="height: 16px; width: 16px; margin-right: 6px; object-fit: contain;">
                        @endif
                        {{ $tech->name }}
                    </span>
                @endforeach
            </div>
        </div>
        
        <div class="col-lg-5" data-aos="fade-left">
            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-xl-5">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-4">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider">Category</span><br>
                            <span class="fs-5 fw-medium text-dark">{{ $project->category->name }}</span>
                        </li>
                        <li class="mb-4">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider">Role</span><br>
                            <span class="fs-5 fw-medium text-dark">{{ $project->role }}</span>
                        </li>
                        <li class="mb-4">
                            <span class="text-muted small fw-bold text-uppercase tracking-wider">Status & Timeline</span><br>
                            <span class="badge bg-{{ $project->status == 'Completed' ? 'success' : 'warning text-dark' }} rounded-pill px-3 py-1 mb-2">{{ $project->status }}</span>
                            <div class="text-muted">{{ $project->start_date->format('M Y') }} &mdash; {{ $project->end_date ? $project->end_date->format('M Y') : 'Present' }}</div>
                        </li>
                    </ul>
                    
                    @if($project->github_url || $project->live_demo)
                        <hr class="my-4">
                        <div class="d-grid gap-3">
                            @if($project->live_demo)
                                <a href="{{ $project->live_demo }}" target="_blank" class="btn btn-primary btn-lg rounded-pill shadow-sm fw-bold">
                                    <i class="bi bi-globe me-2"></i> Live Demo
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-dark btn-lg rounded-pill shadow-sm fw-bold">
                                    <i class="bi bi-github me-2"></i> Source Code
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5" data-aos="zoom-in">
        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="img-fluid rounded-4 shadow-lg w-100 bg-light" style="max-height: 650px; object-fit: cover;" onerror="this.style.display='none'">
    </div>

    <div class="row mb-5 justify-content-center">
        <div class="col-lg-9" data-aos="fade-up">
            <h3 class="fw-bold mb-4 text-dark">About This Project</h3>
            <div class="text-muted fs-5" style="line-height: 1.9;">
                {!! nl2br(e($project->description)) !!}
            </div>

            @if($project->links->count() > 0)
            <div class="mt-5 pt-4 border-top">
                <h5 class="fw-bold mb-4 text-dark">Additional References</h5>
                <div class="d-flex flex-wrap gap-3">
                    @foreach($project->links as $link)
                        <a href="{{ $link->url }}" target="_blank" class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-link-45deg me-1"></i> {{ $link->type }}: {{ $link->label }}
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>

    @if($project->images->count() > 0)
    <div class="mt-5 pt-5 border-top">
        <div class="text-center mb-5" data-aos="fade-up">
            <h3 class="fw-bold text-dark">Screenshot Gallery</h3>
        </div>
        <div class="row g-4">
            @foreach($project->images as $index => $img)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}">
                    <div class="card border-0 bg-transparent">
                        <img src="{{ asset('storage/' . $img->image) }}" class="img-fluid rounded-4 shadow-sm w-100 bg-light" alt="{{ $img->caption }}" style="height: 250px; object-fit: cover; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                        @if($img->caption)
                            <div class="card-body px-0 text-center">
                                <p class="text-muted small mb-0">{{ $img->caption }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection