@extends('layouts.frontend')

@section('title', 'Contact Me')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center" data-aos="fade-down">
        <div class="col-lg-8 text-center mb-5 pb-3">
            <span class="text-primary fw-bold text-uppercase tracking-wider small">Let's Connect</span>
            <h1 class="display-5 fw-bold mt-2 text-dark">Let's Collaborate</h1>
            <p class="lead text-muted mt-3" style="line-height: 1.8;">Interested in working together, have a question, or just want to say hi? Feel free to drop a message below.</p>
        </div>
    </div>

    <div class="row justify-content-center g-5">
        <div class="col-lg-7" data-aos="fade-right">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5 bg-white">
                
                @if(session('success'))
                    <div class="alert alert-success rounded-4 mb-4 p-4 d-flex align-items-center">
                        <i class="bi bi-check-circle-fill fs-3 me-3"></i> 
                        <div>
                            <h6 class="fw-bold mb-0">Message Sent Successfully!</h6>
                            <small>{{ session('success') }}</small>
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Full Name</label>
                            <input type="text" name="name" class="form-control form-control-lg border-0 px-4 py-3 rounded-4 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="John Doe" required style="background-color: var(--bs-light, #f8f9fa);">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-dark">Email Address</label>
                            <input type="email" name="email" class="form-control form-control-lg border-0 px-4 py-3 rounded-4 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="john@example.com" required style="background-color: var(--bs-light, #f8f9fa);">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark">Subject</label>
                            <input type="text" name="subject" class="form-control form-control-lg border-0 px-4 py-3 rounded-4 @error('subject') is-invalid @enderror" value="{{ old('subject') }}" placeholder="Job Opportunity..." required style="background-color: var(--bs-light, #f8f9fa);">
                            @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-dark">Message</label>
                            <textarea name="message" rows="6" class="form-control form-control-lg border-0 px-4 py-3 rounded-4 @error('message') is-invalid @enderror" placeholder="Write your message here..." required style="background-color: var(--bs-light, #f8f9fa);">{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold w-100 py-3 shadow-sm">
                                Send Message Now <i class="bi bi-send ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
            <div class="bg-white rounded-4 p-5 h-100 border shadow-sm">
                <h4 class="fw-bold mb-5 text-dark">Contact Information</h4>
                
                @if(isset($profile) && $profile->email)
                <div class="d-flex mb-4 align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex justify-content-center align-items-center shadow-sm me-4" style="width: 55px; height: 55px;">
                        <i class="bi bi-envelope-fill fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">Email</h6>
                        <a href="mailto:{{ $profile->email }}" class="text-muted text-decoration-none">{{ $profile->email }}</a>
                    </div>
                </div>
                @endif

                @if(isset($profile) && $profile->city)
                <div class="d-flex mb-5 align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex justify-content-center align-items-center shadow-sm me-4" style="width: 55px; height: 55px;">
                        <i class="bi bi-geo-alt-fill fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">Location</h6>
                        <p class="text-muted mb-0">{{ $profile->city }}, {{ $profile->country ?? 'Indonesia' }}</p>
                    </div>
                </div>
                @endif

                @if(isset($socials) && $socials->count() > 0)
                    <hr class="my-4">
                    <h6 class="fw-bold mt-4 mb-3 text-dark">Social Media</h6>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($socials as $social)
                            <a href="{{ $social->url }}" target="_blank" class="btn btn-light bg-light rounded-circle shadow-sm d-flex align-items-center justify-content-center border" style="width: 50px; height: 50px; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'" title="{{ $social->platform }}">
                                <i class="bi bi-{{ strtolower($social->platform) }} text-primary fs-5"></i>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection