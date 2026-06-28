<footer class="bg-white pt-5 pb-4 mt-auto border-top">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-5 pe-lg-5" data-aos="fade-right">
                <h4 class="fw-bold text-dark mb-3">{{ $settings->site_name ?? 'Portfolio.' }}</h4>
                <p class="text-muted" style="line-height: 1.8;">
                    {{ $settings->about ?? __('Building digital solutions with clean, secure, and scalable code.') }}
                </p>
            </div>
            
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <h6 class="fw-bold text-uppercase tracking-wider mb-4">{{ __('Navigation') }}</h6>
                <ul class="list-unstyled d-flex flex-column gap-2">
                    <li><a href="{{ route('home') }}" class="text-muted text-decoration-none nav-link-hover">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="text-muted text-decoration-none nav-link-hover">{{ __('About Me') }}</a></li>
                    <li><a href="{{ route('projects.index') }}" class="text-muted text-decoration-none nav-link-hover">{{ __('Projects & Works') }}</a></li>
                </ul>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-left" data-aos-delay="200">
                <h6 class="fw-bold text-uppercase tracking-wider mb-4">{{ __('Let\'s Connect') }}</h6>
                <div class="d-flex flex-wrap gap-2">
                    @if(isset($socials))
                        @foreach($socials as $social)
                            <a href="{{ $social->url }}" target="_blank" class="btn btn-light border rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;" title="{{ $social->platform }}">
                                @if($social->icon)
                                    <i class="{{ $social->icon }} text-dark fs-5"></i>
                                @else
                                    <i class="bi bi-{{ strtolower($social->platform) }} text-dark fs-5"></i>
                                @endif
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        
        <div class="border-top pt-4 mt-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
            <p class="text-muted small mb-0">&copy; {{ date('Y') }} {{ $settings->footer ?? __('All Rights Reserved.') }}</p>
        </div>
    </div>
</footer>