<div class="sidebar shadow">
    <div class="p-4 text-center border-bottom border-secondary border-opacity-25 mb-3">
        <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center mb-2" style="width: 40px; height: 40px;">
            <i class="bi bi-layers-fill fs-5"></i>
        </div>
        <h5 class="fw-bold mb-0 text-white tracking-wide">Admin Space</h5>
    </div>
    
    <div class="pb-4">
        <ul class="nav flex-column gap-1">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill me-2 opacity-75"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mt-3 mb-1 px-4">
                <small class="text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Portofolio</small>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('admin.projects.index') }}" class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <i class="bi bi-briefcase-fill me-2 opacity-75"></i> Proyek
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.project-categories.index') }}" class="nav-link {{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags-fill me-2 opacity-75"></i> Kategori Proyek
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.technologies.index') }}" class="nav-link {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
                    <i class="bi bi-cpu-fill me-2 opacity-75"></i> Teknologi
                </a>
            </li>

            <li class="nav-item mt-3 mb-1 px-4">
                <small class="text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Resume / CV</small>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.experiences.index') }}" class="nav-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                    <i class="bi bi-building-fill me-2 opacity-75"></i> Pengalaman Kerja
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.educations.index') }}" class="nav-link {{ request()->routeIs('admin.educations.*') ? 'active' : '' }}">
                    <i class="bi bi-mortarboard-fill me-2 opacity-75"></i> Pendidikan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.skills.index') }}" class="nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                    <i class="bi bi-star-fill me-2 opacity-75"></i> Keahlian
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.certificates.index') }}" class="nav-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                    <i class="bi bi-award-fill me-2 opacity-75"></i> Sertifikat
                </a>
            </li>

            <li class="nav-item mt-3 mb-1 px-4">
                <small class="text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">Pengaturan</small>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <div><i class="bi bi-envelope-fill me-2 opacity-75"></i> Pesan Masuk</div>
                    @if(isset($unreadMessages) && $unreadMessages > 0)
                        <span class="badge bg-danger rounded-pill">{{ $unreadMessages }}</span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.social-links.index') }}" class="nav-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
                    <i class="bi bi-share-fill me-2 opacity-75"></i> Tautan Sosial
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.profile.edit') }}" class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <i class="bi bi-person-circle me-2 opacity-75"></i> Profil & CV
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settings.edit') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="bi bi-gear-fill me-2 opacity-75"></i> Pengaturan Situs
                </a>
            </li>
        </ul>
    </div>
</div>