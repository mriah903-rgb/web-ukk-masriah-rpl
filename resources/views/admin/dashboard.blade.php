@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between
            align-items-md-center
            gap-2
            mb-4">

    <div>
        <h1 class="fw-bold text-dark mb-1">
            SMKN 1 CIJATI
        </h1>

        <p class="text-muted mb-0">
            Selamat datang di panel administrasi website sekolah.
        </p>
    </div>

    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">

                <li class="breadcrumb-item">
                    <a href="{{ route('beranda') }}"
                       class="text-decoration-none">
                        Home
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Dashboard
                </li>

            </ol>
        </nav>
    </div>

</div>


{{-- ========================================================= --}}
{{-- STATISTIK WEBSITE --}}
{{-- ========================================================= --}}

<div class="row g-4 mb-4">

    {{-- BERITA --}}
    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-3 h-100 bg-info text-white">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h2 class="fw-bold mb-1">
                            {{ $jumlahBerita }}
                        </h2>

                        <p class="mb-0 text-white-50 fw-semibold">
                            Berita
                        </p>
                    </div>

                    <i class="bi bi-newspaper fs-1 opacity-25"></i>

                </div>

            </div>

            <div class="card-footer border-0 bg-black bg-opacity-10 p-0">

                <a href="{{ route('admin.berita.index') }}"
                   class="d-flex justify-content-between align-items-center
                          text-white text-decoration-none
                          px-4 py-2 fw-semibold">

                    <span>Kelola Berita</span>

                    <i class="bi bi-arrow-right-circle"></i>

                </a>

            </div>

        </div>

    </div>


    {{-- GURU --}}
    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-3 h-100 bg-success text-white">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahGuru }}
                        </h2>

                        <p class="mb-0 text-white-50 fw-semibold">
                            Guru
                        </p>

                    </div>

                    <i class="bi bi-person-badge fs-1 opacity-25"></i>

                </div>

            </div>

            <div class="card-footer border-0 bg-black bg-opacity-10 p-0">

                <a href="{{ route('admin.guru.index') }}"
                   class="d-flex justify-content-between align-items-center
                          text-white text-decoration-none
                          px-4 py-2 fw-semibold">

                    <span>Kelola Guru</span>

                    <i class="bi bi-arrow-right-circle"></i>

                </a>

            </div>

        </div>

    </div>


    {{-- JURUSAN --}}
    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-3 h-100 bg-warning text-dark">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahJurusan }}
                        </h2>

                        <p class="mb-0 opacity-75 fw-semibold">
                            Jurusan
                        </p>

                    </div>

                    <i class="bi bi-mortarboard fs-1 opacity-25"></i>

                </div>

            </div>

            <div class="card-footer border-0 bg-black bg-opacity-10 p-0">

                <a href="{{ route('admin.jurusan.index') }}"
                   class="d-flex justify-content-between align-items-center
                          text-dark text-decoration-none
                          px-4 py-2 fw-semibold">

                    <span>Kelola Jurusan</span>

                    <i class="bi bi-arrow-right-circle"></i>

                </a>

            </div>

        </div>

    </div>


    {{-- EKSTRAKURIKULER --}}
    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-3 h-100 bg-danger text-white">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahEkskul }}
                        </h2>

                        <p class="mb-0 text-white-50 fw-semibold">
                            Ekstrakurikuler
                        </p>

                    </div>

                    <i class="bi bi-people fs-1 opacity-25"></i>

                </div>

            </div>

            <div class="card-footer border-0 bg-black bg-opacity-10 p-0">

                <a href="{{ route('admin.ekstrakurikuler.index') }}"
                   class="d-flex justify-content-between align-items-center
                          text-white text-decoration-none
                          px-4 py-2 fw-semibold">

                    <span>Kelola Ekskul</span>

                    <i class="bi bi-arrow-right-circle"></i>

                </a>

            </div>

        </div>

    </div>


    {{-- OSIS --}}
    <div class="col-xl-3 col-md-6">

        <div class="card border-0 shadow-sm rounded-3 h-100 bg-primary text-white">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <h2 class="fw-bold mb-1">
                            {{ $jumlahOsis }}
                        </h2>

                        <p class="mb-0 text-white-50 fw-semibold">
                            Pengurus OSIS
                        </p>

                    </div>

                    <i class="bi bi-people-fill fs-1 opacity-25"></i>

                </div>

            </div>

            <div class="card-footer border-0 bg-black bg-opacity-10 p-0">

                <a href="{{ route('admin.osis.index') }}"
                   class="d-flex justify-content-between align-items-center
                          text-white text-decoration-none
                          px-4 py-2 fw-semibold">

                    <span>Kelola OSIS</span>

                    <i class="bi bi-arrow-right-circle"></i>

                </a>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- AKSI CEPAT --}}
{{-- ========================================================= --}}

<div class="card border-0 shadow-sm rounded-3">

    <div class="card-body p-4">

        <div class="d-flex justify-content-between
                    align-items-center
                    mb-4">

            <div>

                <h5 class="fw-bold text-dark mb-1">
                    Aksi Cepat
                </h5>

                <p class="text-muted mb-0">
                    Kelola konten website sekolah
                </p>

            </div>

            <i class="bi bi-grid fs-3 text-primary"></i>

        </div>


        <div class="row g-3">

            {{-- GALERI --}}
            <div class="col-xl-3 col-md-6">

                <a href="{{ route('admin.galeri.index') }}"
                   class="btn btn-outline-primary
                          w-100
                          py-3
                          fw-semibold
                          d-flex
                          align-items-center">

                    <i class="bi bi-images fs-5 me-2"></i>

                    <span>Kelola Galeri</span>

                </a>

            </div>


            {{-- BANNER --}}
            <div class="col-xl-3 col-md-6">

                <a href="{{ route('admin.banner.index') }}"
                   class="btn btn-outline-success
                          w-100
                          py-3
                          fw-semibold
                          d-flex
                          align-items-center">

                    <i class="bi bi-image fs-5 me-2"></i>

                    <span>Kelola Banner</span>

                </a>

            </div>


            {{-- PROFIL SEKOLAH --}}
            <div class="col-xl-3 col-md-6">

                <a href="{{ route('admin.profilsekolah.index') }}"
                   class="btn btn-outline-warning
                          w-100
                          py-3
                          fw-semibold
                          text-dark
                          d-flex
                          align-items-center">

                    <i class="bi bi-building fs-5 me-2"></i>

                    <span>Profil Sekolah</span>

                </a>

            </div>


            {{-- LOGOUT --}}
            <div class="col-xl-3 col-md-6">

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="w-100">

                    @csrf

                    <button type="submit"
                            class="btn btn-outline-danger
                                   w-100
                                   py-3
                                   fw-semibold
                                   d-flex
                                   align-items-center">

                        <i class="bi bi-box-arrow-right fs-5 me-2"></i>

                        <span>Logout</span>

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection