@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<section class="py-5 overflow-hidden position-relative">
    <div class="container py-5 mt-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="d-inline-block px-4 py-2 mb-4 rounded-pill bg-primary bg-opacity-10 text-primary fw-bold small tracking-wider">
                    <i class="bi bi-stars me-1"></i> AVAILABLE FOR WORK
                </div>
                
                <h1 class="display-3 fw-bold text-dark mb-3" style="letter-spacing: -1px;">
                    Hello, I'm <span class="text-primary">{{ $profile->full_name ?? 'Backend Developer' }}</span>
                </h1>
                
                <h2 class="h4 text-secondary mb-4 fw-normal" style="line-height: 1.6;">
                    {{ $profile->profession ?? 'Junior Backend Developer | Laravel Developer' }}
                </h2>
                
                <p class="text-muted mb-5 fs-5" style="line-height: 1.8;">
                    {{ $profile->headline ?? 'I build robust, secure, and scalable backend systems & AI Models.' }}
                </p>
                
                <div class="d-flex flex-wrap gap-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('projects.index') }}" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm">
                        View My Work <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg px-5 py-3 rounded-pill shadow-sm border text-dark">
                        Contact Me
                    </a>
                </div>
            </div>
            
            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="100">
                <div class="position-relative d-inline-block">
                    <div class="position-absolute top-50 start-50 translate-middle bg-primary rounded-circle" style="width: 450px; height: 450px; filter: blur(90px); opacity: 0.15; z-index: -1;"></div>
                    
                    @if(isset($profile) && $profile->photo)
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->full_name }}" class="img-fluid rounded-4 shadow-lg border border-4 border-white" style="width: 400px; height: 480px; object-fit: cover; transform: rotate(2deg); transition: transform 0.3s ease;" onmouseover="this.style.transform='rotate(0deg)'" onmouseout="this.style.transform='rotate(2deg)'" onerror="this.style.display='none'; this.nextElementSibling.style.setProperty('display', 'inline-flex', 'important');">
                        
                        <div class="bg-white rounded-4 justify-content-center align-items-center text-primary shadow-lg border border-4 border-white" style="width: 400px; height: 480px; font-size: 8rem; transform: rotate(2deg); display: none;">
                            <i class="bi bi-person-bounding-box"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($skills) && $skills->count() > 0)
<section class="py-5 border-top border-bottom bg-white" data-aos="fade-up">
    <div class="container text-center">
        <p class="text-muted small fw-bold text-uppercase tracking-wider mb-4">Tech Stack & Tools</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            @foreach($skills as $skill)
                <span class="badge bg-light text-dark border px-4 py-2 rounded-pill fw-medium shadow-sm fs-6">
                    {{ $skill->name }}
                </span>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="py-5 bg-light">
    <div class="container py-5 mt-4">
        <div class="text-center mb-5 pb-3" data-aos="fade-up">
            <span class="text-primary fw-bold text-uppercase tracking-wider small">Portfolio</span>
            <h2 class="display-5 fw-bold mt-2 text-dark">Featured Projects</h2>
            <div class="mx-auto bg-primary rounded-pill mt-3" style="width: 60px; height: 5px;"></div>
        </div>

        <div class="row g-4">
            @forelse($featuredProjects as $index => $project)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}">
                <div class="card h-100 border-0 bg-white shadow-sm rounded-4 overflow-hidden text-start">
                    <div class="position-relative overflow-hidden bg-light d-flex justify-content-center align-items-center" style="height: 250px;">
                        <img src="{{ asset('storage/' . $project->thumbnail) }}" class="card-img-top transition-transform w-100 h-100" alt="{{ $project->title }}" style="object-fit: cover;" onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                        <i class="bi bi-image text-secondary opacity-25" style="font-size: 5rem; display: none;"></i>
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge bg-white text-primary shadow-sm rounded-pill px-3 py-2 fw-semibold border">
                                {{ $project->category->name }}
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
                    <div class="card-footer bg-transparent border-0 px-4 pb-4 pt-0">
                        <span class="text-primary fw-bold small d-flex align-items-center">
                            View Case Study <i class="bi bi-arrow-right ms-2 fs-5"></i>
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5 text-muted" data-aos="zoom-in">
                <div class="bg-white p-5 rounded-4 shadow-sm d-inline-block border">
                    <i class="bi bi-folder-x display-1 mb-3 text-secondary opacity-50"></i>
                    <h4 class="fw-bold text-dark">No Projects Yet</h4>
                    <p class="mb-0">Publish a project and mark it as "Featured" in the admin dashboard.</p>
                </div>
            </div>
            @endforelse
        </div>
        
        @if($featuredProjects->count() > 0)
        <div class="text-center mt-5 pt-4" data-aos="fade-up">
            <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary btn-lg rounded-pill px-5 py-3 fw-bold text-dark">
                Explore All Projects
            </a>
        </div>
        @endif
    </div>
</section>
@endsection