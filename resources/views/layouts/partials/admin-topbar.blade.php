<header class="py-3 px-4 d-flex justify-content-between align-items-center" style="background-color: transparent;">
    <div class="d-flex align-items-center text-muted">
        <button id="sidebarToggle" class="btn btn-white bg-white border-0 shadow-sm rounded-circle me-3 d-flex justify-content-center align-items-center" style="width: 42px; height: 42px; transition: 0.3s;">
            <i class="bi bi-list fs-4 text-dark"></i>
        </button>
        <span class="d-none d-md-block fw-semibold"><i class="bi bi-calendar2-event text-primary me-2"></i> {{ now()->translatedFormat('l, d F Y') }}</span>
    </div>
    
    <div class="dropdown ms-auto">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle bg-white px-3 py-2 rounded-pill shadow-sm" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" style="transition: 0.3s;">
            <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2 shadow-sm" style="width: 32px; height: 32px; font-size: 0.8rem;">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <span class="fw-bold me-1 text-dark">{{ Auth::user()->name ?? 'Administrator' }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 mt-3 p-2" aria-labelledby="dropdownUser">
            <li><a class="dropdown-item py-2 rounded-3 mb-1" href="{{ route('admin.profile.edit') }}"><i class="bi bi-person me-2"></i> Edit Profil</a></li>
            <li><a class="dropdown-item py-2 rounded-3 mb-1" href="{{ route('home') }}" target="_blank"><i class="bi bi-box-arrow-up-right me-2"></i> Lihat Website</a></li>
            <li><hr class="dropdown-divider opacity-10"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item py-2 rounded-3 text-danger fw-bold"><i class="bi bi-box-arrow-right me-2"></i> Keluar</button>
                </form>
            </li>
        </ul>
    </div>
</header>