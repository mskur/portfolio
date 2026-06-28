<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - Admin Portfolio</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <style>
        :root {
            --bs-body-font-family: 'Nunito', sans-serif;
            --bs-body-bg: #f3f6f9;
            --bs-primary: #6366f1;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --soft-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
        }

        body { font-family: var(--bs-body-font-family); color: #475569; overflow-x: hidden; }
        
        /* 1. ANIMASI HALUS SAAT HALAMAN DIMUAT (FADE-IN UP) */
        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        main { animation: slideUpFade 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* 2. INTERAKSI KARTU KETIKA DI-HOVER (MELAYANG NAIK) */
        .card { 
            border: none !important; 
            border-radius: 1.25rem !important; 
            box-shadow: var(--soft-shadow) !important; 
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1) !important;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(99, 102, 241, 0.12) !important;
        }

        /* 3. INTERAKSI IKON SIDEBAR BEREAKSI */
        .sidebar { background-color: var(--sidebar-bg); min-height: 100vh; width: 260px; transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); z-index: 1000; }
        .sidebar .nav-link { color: #94a3b8 !important; border-radius: 0.75rem; margin: 0.2rem 1rem; padding: 0.6rem 1rem; transition: all 0.3s ease; }
        .sidebar .nav-link:hover { background-color: var(--sidebar-hover); color: #f8fafc !important; transform: translateX(5px); }
        .sidebar .nav-link i { transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .sidebar .nav-link:hover i { transform: scale(1.25) rotate(-10deg); color: #818cf8; }
        .sidebar .nav-link.active { background-color: var(--bs-primary); color: #ffffff !important; box-shadow: 0 4px 12px rgba(99,102,241,0.3); }

        /* 4. INTERAKSI TOMBOL & TABEL */
        .btn { border-radius: 0.75rem; font-weight: 600; padding: 0.5rem 1.25rem; transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); }
        .btn:hover { transform: translateY(-2px); }
        .table-hover tbody tr { transition: all 0.2s ease; }
        .table-hover tbody tr:hover { background-color: rgba(99,102,241,0.04) !important; transform: scale(1.01); box-shadow: 0 4px 10px rgba(0,0,0,0.02); border-radius: 0.5rem; }

        /* 5. LOGIKA TOGGLE BUKA-TUTUP SIDEBAR */
        .main-content { width: calc(100% - 260px); transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); }
        .sidebar.collapsed { margin-left: -260px; }
        .main-content.expanded { width: 100%; }
        
        @media (max-width: 768px) {
            .sidebar { position: fixed; height: 100vh; overflow-y: auto; }
            .sidebar.collapsed { margin-left: -100%; }
            .main-content { width: 100%; }
        }
    </style>
</head>
<body>

    <div class="d-flex flex-column flex-md-row">
        @include('layouts.partials.admin-sidebar')

        <div class="main-content flex-grow-1">
            @include('layouts.partials.admin-topbar')

            <main class="p-4 p-md-5">
                @if(session('success'))
                    <div class="alert alert-success border-0 rounded-4 shadow-sm alert-dismissible fade show d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-check-circle-fill fs-5 me-2 text-success"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>


    <script>
        // Logika agar tombol hamburger bisa memunculkan/menyembunyikan sidebar
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('expanded');
            
            let icon = this.querySelector('i');
            icon.classList.toggle('bi-list');
            icon.classList.toggle('bi-text-indent-left');
        });
    </script>
</body>
</html>