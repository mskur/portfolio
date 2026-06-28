@extends('layouts.frontend')

@section('title', 'About Me')

@section('content')
<div class="container py-5 mt-5">
    <div class="row mb-5 align-items-center" data-aos="fade-down">
        <div class="col-md-8">
            <span class="text-primary fw-bold text-uppercase tracking-wider small">Resume</span>
            <h1 class="display-5 fw-bold mb-3 mt-2 text-dark">About Me</h1>
            <p class="lead text-muted" style="line-height: 1.8;">{{ $profile->bio ?? 'Details of my professional journey and experiences.' }}</p>
        </div>
        <div class="col-md-4 text-md-end mt-4 mt-md-0">
            @if(isset($profile) && $profile->cv)
                <a href="{{ route('download.cv') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-4">
                    <i class="bi bi-download me-2"></i> Download CV
                </a>
            @endif
        </div>
    </div>

    <div class="row g-5">
        <div class="col-lg-8">
            <h3 class="fw-bold mb-4 border-bottom pb-2 text-dark" data-aos="fade-up">Work Experience</h3>
            <div class="mb-5">
                @forelse($experiences as $index => $exp)
                    <div class="d-flex mb-4 p-4 bg-white rounded-4 shadow-sm border" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="me-4 mt-1">
                            @if($exp->logo)
                                <img src="{{ asset('storage/' . $exp->logo) }}" class="rounded" style="width: 60px; height: 60px; object-fit: contain;">
                            @else
                                <div class="bg-primary bg-opacity-10 text-primary rounded d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-briefcase fs-3"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1 text-dark">{{ $exp->position }}</h5>
                            <h6 class="text-primary mb-2">{{ $exp->company }} <span class="badge bg-secondary bg-opacity-10 text-secondary border ms-2">{{ $exp->employment_type }}</span></h6>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-calendar3 me-1"></i> {{ $exp->start_date->format('M Y') }} - {{ $exp->currently_working ? 'Present' : ($exp->end_date ? $exp->end_date->format('M Y') : '-') }}
                            </p>
                            <p class="mb-0 text-muted">{{ $exp->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No work experience added yet.</p>
                @endforelse
            </div>

            <h3 class="fw-bold mb-4 border-bottom pb-2 text-dark" data-aos="fade-up">Education History</h3>
            <div class="mb-5">
                @forelse($educations as $index => $edu)
                    <div class="d-flex mb-4 p-4 bg-white rounded-4 shadow-sm border" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="me-4 mt-1">
                            @if($edu->logo)
                                <img src="{{ asset('storage/' . $edu->logo) }}" class="rounded" style="width: 60px; height: 60px; object-fit: contain;">
                            @else
                                <div class="bg-primary bg-opacity-10 text-primary rounded d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-building fs-3"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1 text-dark">{{ $edu->institution }}</h5>
                            <h6 class="text-primary mb-2">{{ $edu->degree }} - {{ $edu->major }}</h6>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-calendar3 me-1"></i> {{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}
                            </p>
                            <p class="mb-0 text-muted">{{ $edu->description }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No education history added yet.</p>
                @endforelse
            </div>
        </div>

        <div class="col-lg-4" data-aos="fade-left">
            <div class="card border-0 shadow-sm rounded-4 bg-white">
                <div class="card-body p-4 p-xl-5">
                    <h4 class="fw-bold mb-4 text-dark">Certifications</h4>
                    @forelse($certificates as $cert)
                        <div class="mb-4 pb-3 border-bottom">
                            <h6 class="fw-bold mb-1 text-dark">{{ $cert->title }}</h6>
                            <p class="text-primary small mb-1">{{ $cert->issuer }}</p>
                            <p class="text-muted small mb-2"><i class="bi bi-patch-check-fill text-success me-1"></i> {{ $cert->issue_date->format('M Y') }}</p>
                            
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @if($cert->credential_url)
                                    <a href="{{ $cert->credential_url }}" target="_blank" class="btn btn-sm btn-light border fw-semibold small text-dark">
                                        <i class="bi bi-link-45deg"></i> Credential
                                    </a>
                                @endif
                                
                                @if($cert->image)
                                    @if(Str::endsWith($cert->image, '.pdf'))
                                        <a href="{{ asset('storage/' . $cert->image) }}" target="_blank" class="btn btn-sm btn-outline-danger fw-semibold small">
                                            <i class="bi bi-file-earmark-pdf-fill"></i> View PDF
                                        </a>
                                    @else
                                        <a href="{{ asset('storage/' . $cert->image) }}" target="_blank" class="btn btn-sm btn-outline-primary fw-semibold small">
                                            <i class="bi bi-image"></i> View Image
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-muted small">No certifications added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection