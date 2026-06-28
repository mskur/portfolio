<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ $settings->site_name ?? 'Portfolio' }}</title>
    
    @if(isset($settings) && $settings->favicon)
        <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

        <style>
            /* Transisi Halus untuk Dark Mode */
            body, .card, .bg-light, .bg-white, .navbar, footer {
                transition: background-color 0.4s ease, color 0.4s ease, border-color 0.4s ease;
            }

            /* Variabel Dark Mode Override */
            [data-theme="dark"] {
                --bs-body-bg: #0f172a;
                --bs-body-color: #f8fafc;
            }
            
            [data-theme="dark"] body { background-color: var(--bs-body-bg); color: var(--bs-body-color); }
            [data-theme="dark"] .bg-white, 
            [data-theme="dark"] .card { background-color: #1e293b !important; border-color: #334155 !important; }
            [data-theme="dark"] .bg-light { background-color: #0f172a !important; }
            [data-theme="dark"] .text-dark { color: #f8fafc !important; }
            [data-theme="dark"] .text-muted { color: #94a3b8 !important; }
            [data-theme="dark"] .navbar { background-color: rgba(30, 41, 59, 0.95) !important; }
            [data-theme="dark"] .border, 
            [data-theme="dark"] .border-top, 
            [data-theme="dark"] .border-bottom { border-color: #334155 !important; }
            [data-theme="dark"] .form-control { background-color: #0f172a !important; color: #f8fafc; border-color: #334155; }
            [data-theme="dark"] .form-control::placeholder { color: #64748b; }

        <script>
            if(localStorage.getItem('theme') === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        </script>
        /* CSS Custom untuk Pagination Pagination agar Sesuai Tema */
        
        /* 1. Memberi jarak antar tombol */
        .pagination {
            gap: 0.5rem;
            align-items: center;
            justify-content: center;
        }

        /* 2. Mengubah bentuk tombol menjadi bulat dengan shadow halus */
        .page-item .page-link {
            border: none !important;
            border-radius: 50% !important; /* Membuatnya bulat sempurna */
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b; /* Warna teks abu-abu kebiruan */
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.04);
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            margin: 0 !important;
        }

        /* 3. Efek saat tombol disorot mouse (Hover) */
        .page-item:not(.active):not(.disabled) .page-link:hover {
            background-color: rgba(99, 102, 241, 0.1); /* Background biru super transparan */
            color: #6366f1; /* Teks Soft Indigo */
            transform: translateY(-3px); /* Efek melayang */
            box-shadow: 0 8px 15px rgba(99, 102, 241, 0.15);
        }

        /* 4. Efek tombol yang sedang aktif (Halaman saat ini) */
        .page-item.active .page-link {
            background-color: #6366f1 !important; /* Soft Indigo */
            color: #ffffff !important;
            box-shadow: 0 6px 15px rgba(99, 102, 241, 0.35) !important;
            transform: scale(1.05); /* Sedikit membesar */
        }

        /* 5. Tombol Prev/Next yang non-aktif (saat di hal pertama/terakhir) */
        .page-item.disabled .page-link {
            background-color: transparent !important;
            box-shadow: none !important;
            color: #cbd5e1 !important;
        }

        /* 6. Menonaktifkan area "Showing 1 to 6..." bawaan Laravel agar lebih bersih */
        .d-flex.justify-content-between.flex-fill.d-sm-none, 
        .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between > div:first-child {
            display: none !important; 
        }
        
        /* Memusatkan area pagination setelah teksnya dihilangkan */
        .d-none.flex-sm-fill.d-sm-flex.align-items-sm-center.justify-content-sm-between > div:last-child {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    @include('layouts.partials.frontend-navbar')

    <main class="flex-shrink-0">
        @yield('content')
    </main>

    @include('layouts.partials.frontend-footer')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi Animasi AOS
        AOS.init({
            duration: 800, // durasi animasi 0.8 detik
            once: true, // animasi hanya dimainkan sekali saat di-scroll
            offset: 50 // jarak scroll sebelum elemen muncul
        });
        window.addEventListener('load', function() {
            AOS.refresh();
        });
    </script>

    <script>
        const toggleBtn = document.getElementById('darkModeToggle');
        const htmlEl = document.documentElement;
        const icon = toggleBtn.querySelector('i');

        // Set icon awal
        if(localStorage.getItem('theme') === 'dark') {
            icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            icon.classList.replace('text-secondary', 'text-warning');
        }

        toggleBtn.addEventListener('click', () => {
            if(htmlEl.getAttribute('data-theme') === 'dark') {
                htmlEl.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
                icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                icon.classList.replace('text-warning', 'text-secondary');
            } else {
                htmlEl.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                icon.classList.replace('text-secondary', 'text-warning');
            }
        });
    </script>
</body>
</html>