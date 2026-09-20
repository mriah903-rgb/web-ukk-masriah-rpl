<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', 'Admin Dashboard')
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>

<body class="bg-light">
<nav class="navbar navbar-dark bg-dark border-bottom border-warning border-3 shadow-sm sticky-top">
    <div class="container-fluid px-4">
     
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand fw-bold">
            <i class="bi bi-speedometer2 text-warning me-2"></i>
        Dashboard
        </a>
        <div class="d-flex align-items-center">
            <span class="text-white me-3 d-none d-md-inline">
                Administraton
            </span>
            <i class="bi bi-person-circle text-warning fs-4"></i>
        </div>
    </div>
</nav>
<div class="container-fluid px-0">
    <div class="row g-0">
        <aside class="col-md-3 col-lg-2 bg-dark text-white min-vh-100">
            <div class="d-flex flex-column p-3 min-vh-100">
                <div class="text-center mb-4">        
        <div class="text-center mb-4"> 
    <img
        src="{{ asset('masri.jpg') }}"
        alt="Foto Profil Admin SMKN 1 Cijati"
        class="rounded-circle border border-white shadow-sm"
        style="width: 120px; height: 120px; object-fit: cover; display: block; margin: 0 auto;">
    <h6 class="fw-bold mt-3 mb-1 text-white">ADMIN</h6>
    <p class="text-secondary small mb-0">Sistem Informasi Sekolah</p>    
    </div>
         <hr class="border-secondary">
                <ul class="nav nav-pills flex-column gap-1">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link text-white bg-warning text-dark fw-semibold rounded-3">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.profilsekolah.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-building me-2"></i>
                            Profil Sekolah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.guru.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-person-badge me-2"></i>
                            Data Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.jurusan.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-mortarboard me-2"></i>
                            Jurusan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.berita.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-newspaper me-2"></i>
                            Berita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.ekstrakurikuler.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-people me-2"></i>
                            Ekstrakurikuler
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galeri.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-images me-2"></i>
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.banner.index') }}"
                           class="nav-link text-white rounded-3">
                            <i class="bi bi-image me-2"></i>
                            Banner
                        </a>
                    </li>
                </ul>
                <div class="flex-grow-1"></div>
                <div class="border-top border-secondary pt-3 mt-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle text-warning fs-4 me-2"></i>
                        <div>
                            <span class="d-block text-white fw-semibold">
                                Administrator
                            </span>
                            <small class="text-white-50">
                                Online
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <main class="col-md-9 col-lg-10 bg-light d-flex flex-column min-vh-100">
            <div class="p-4 flex-grow-1">
                @yield('content')
            </div>
            <footer class="bg-white border-top py-3 px-4 text-muted small mt-auto">
                @include('layouts.footer')
            </footer>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>