@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Beranda Dashboard</h2>
        <p class="text-muted mb-0">Selamat datang kembali, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>! Ini ringkasan portofoliomu hari ini.</p>
    </div>
    <div>
        <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary shadow-sm">
            <i class="bi bi-box-arrow-up-right me-1"></i> Lihat Website
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-briefcase-fill fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 fw-semibold">Total Proyek</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['projects'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-star-fill fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 fw-semibold">Total Keahlian</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['skills'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-success bg-opacity-10 text-success rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-award-fill fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 fw-semibold">Sertifikat</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['certificates'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 text-warning rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 60px; height: 60px;">
                    <i class="bi bi-envelope-fill fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 fw-semibold">Pesan Baru</h6>
                    <h3 class="fw-bold mb-0 text-dark">{{ $stats['unread_messages'] }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-journal-code text-primary me-2"></i> Proyek Terakhir Ditambahkan</h6>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-link text-decoration-none">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="px-4">Nama Proyek</th>
                                <th>Kategori</th>
                                <th class="text-center px-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProjects as $project)
                            <tr>
                                <td class="px-4 fw-semibold text-dark">{{ $project->title }}</td>
                                <td>{{ $project->category->name ?? '-' }}</td>
                                <td class="text-center px-4">
                                    @if($project->featured)
                                        <span class="badge bg-success bg-opacity-10 text-success border border-success">Featured</span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary">Reguler</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">Belum ada data proyek.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                <h6 class="fw-bold mb-0"><i class="bi bi-chat-dots text-warning me-2"></i> Pesan Masuk Terbaru</h6>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-link text-decoration-none">Kotak Masuk</a>
            </div>
            <div class="card-body p-0">
                <div class="list-group list-group-flush">
                    @forelse($recentMessages as $msg)
                    <a href="{{ route('admin.contacts.show', $msg) }}" class="list-group-item list-group-item-action px-4 py-3 {{ $msg->is_read ? '' : 'bg-light' }}">
                        <div class="d-flex w-100 justify-content-between align-items-center mb-1">
                            <h6 class="mb-0 fw-bold {{ $msg->is_read ? 'text-secondary' : 'text-dark' }}">{{ $msg->name }}</h6>
                            <small class="text-muted" style="font-size: 0.75rem;">{{ $msg->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-0 text-truncate text-muted" style="max-width: 90%; font-size: 0.9rem;">
                            @if(!$msg->is_read) <span class="badge bg-danger me-1" style="font-size: 0.6rem;">BARU</span> @endif
                            {{ $msg->subject }}
                        </p>
                    </a>
                    @empty
                    <div class="text-center py-5 text-muted">
                        <i class="bi bi-inbox fs-2 d-block mb-2 opacity-50"></i>
                        Belum ada pesan masuk.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection