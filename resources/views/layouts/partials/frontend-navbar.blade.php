<nav class="navbar navbar-expand-lg fixed-top shadow-sm transition-all" style="background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(0,0,0,0.05);">
    <div class="container py-1">
        <a class="navbar-brand fw-bold d-flex align-items-center text-dark" href="{{ route('home') }}">
            @if(isset($settings) && $settings->logo)
                <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" height="36" class="me-2 rounded">
            @else
                <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2" style="width: 36px; height: 36px;">
                    <i class="bi bi-code-slash"></i>
                </div>
            @endif
            <span class="tracking-wider">{{ $settings->site_name ?? 'Portfolio.' }}</span>
        </a>
        
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-medium align-items-lg-center gap-2">
                <li class="nav-item">
                    <a class="nav-link px-3 rounded-pill {{ request()->routeIs('home') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-secondary' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded-pill {{ request()->routeIs('about') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-secondary' }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded-pill {{ request()->routeIs('projects.*') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-secondary' }}" href="{{ route('projects.index') }}">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 rounded-pill {{ request()->routeIs('contact') ? 'active bg-primary bg-opacity-10 text-primary' : 'text-secondary' }}" href="{{ route('contact') }}">Contact</a>
                </li>
                
                {{-- Pembatas / Divider khusus untuk layar Desktop (Opsional, agar lebih manis) --}}
                <li class="nav-item d-none d-lg-flex align-items-center px-2">
                    <div class="bg-secondary opacity-25" style="width: 2px; height: 24px;"></div>
                </li>

                {{-- Tombol Dark Mode yang sudah disejajarkan --}}
                <li class="nav-item d-flex align-items-center my-2 my-lg-0">
                    <button id="darkModeToggle" class="btn btn-light border shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; transition: all 0.3s ease;" title="Toggle Dark/Light Mode">
                        <i class="bi bi-moon-fill text-secondary"></i>
                    </button>
                </li>

                {{-- Tombol Toggle Bahasa --}}
                <!-- <li class="nav-item d-flex align-items-center my-2 my-lg-0 mx-lg-2">
                    <a href="{{ route('lang.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}" class="btn btn-outline-secondary rounded-pill fw-bold d-flex align-items-center shadow-sm bg-white text-dark" style="padding: 0.35rem 0.75rem; font-size: 0.85rem;" title="Switch Language">
                        <i class="bi bi-translate me-2 text-primary"></i> {{ app()->getLocale() == 'id' ? 'EN' : 'ID' }}
                    </a>
                </li> -->

                @if(isset($profile) && $profile->cv)
                <li class="nav-item ms-lg-2 my-2 my-lg-0">
                    <a class="btn btn-primary rounded-pill px-4 shadow-sm w-100" href="{{ route('download.cv') }}">
                        <i class="bi bi-cloud-download me-2"></i> Resume
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>