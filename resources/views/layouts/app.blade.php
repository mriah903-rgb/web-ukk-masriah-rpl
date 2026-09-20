<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Website Sekolah')
    </title>

    {{-- Bootstrap CSS --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    {{-- CSS dari halaman tertentu --}}
    @stack('styles')

    <style>
        /* =========================================================
           WARNA WEBSITE
        ========================================================= */

        :root {
            --biru-tua: #002e5c;
            --biru: #004282;
            --biru-muda: #0c57a3;
            --emas: #f1b418;
            --emas-muda: #fff8dc;
        }


        /* =========================================================
           CARD INTERAKTIF
        ========================================================= */

        .interactive-card {
            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;
        }

        .interactive-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 1rem 2rem rgba(0, 46, 92, 0.18) !important;
        }


        /* =========================================================
           ICON
        ========================================================= */

        .icon-box {
            transition:
                transform 0.35s ease,
                background-color 0.35s ease;
        }

        .interactive-card:hover .icon-box {
            transform: rotate(-6deg) scale(1.1);
            background-color: var(--emas) !important;
        }


        /* =========================================================
           TOMBOL INTERAKTIF
        ========================================================= */

        .btn-interactive {
            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .btn-interactive:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(0, 46, 92, 0.20);
        }


        /* =========================================================
           JUDUL SECTION
        ========================================================= */

        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: "";
            display: block;
            width: 60%;
            height: 4px;
            margin: 10px auto 0;
            border-radius: 50px;

            background: linear-gradient(
                90deg,
                var(--emas),
                var(--biru-muda)
            );
        }


        /* =========================================================
           GELOMBANG
        ========================================================= */

        .gold-blue-wave {
            position: relative;
            width: 100%;
            height: 80px;
            overflow: hidden;

            background: linear-gradient(
                90deg,
                var(--emas),
                #e8c34e,
                var(--biru-muda),
                var(--biru)
            );
        }

        .gold-blue-wave::before {
            content: "";
            position: absolute;

            width: 120%;
            height: 100px;

            left: -10%;
            top: -58px;

            background: var(--emas-muda);

            border-radius: 0 0 50% 50%;
        }

        .gold-blue-wave::after {
            content: "";
            position: absolute;

            width: 120%;
            height: 70px;

            left: -10%;
            bottom: -48px;

            background: var(--biru-tua);

            border-radius: 50% 50% 0 0;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 768px) {

            .gold-blue-wave {
                height: 55px;
            }

            .gold-blue-wave::before {
                height: 70px;
                top: -42px;
            }

            .gold-blue-wave::after {
                height: 50px;
                bottom: -35px;
            }
        }
    </style>
</head>


<body class="bg-light d-flex flex-column min-vh-100">


    {{-- =========================================================
         NAVBAR
    ========================================================= --}}

    <nav
        class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top border-bottom border-warning border-3"
    >

        <div class="container">

            {{-- Logo dan Nama Sekolah --}}
            <a
                href="{{ route('home.beranda') }}"
                class="navbar-brand fw-bold d-flex align-items-center gap-2"
            >

                @if ($profil?->logo)

                    <img
                        src="{{ asset('uploads/profil-sekolah/' . $profil->logo) }}"
                        alt="{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}"
                        class="img-fluid"
                        style="max-height: 40px; object-fit: contain;"
                    >

                @else

                    <i class="bi bi-mortarboard-fill text-warning fs-4"></i>

                @endif

                <span class="text-white fs-5">
                    {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                </span>

            </a>


            {{-- Tombol Navbar Mobile --}}
            <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            {{-- Menu Navbar --}}
            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >

                <div class="navbar-nav ms-auto gap-lg-2">


                    {{-- Beranda --}}
                    <a
                        href="{{ route('home.beranda') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('home.beranda')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Beranda
                    </a>


                    {{-- Profil Sekolah --}}
                    <a
                        href="{{ route('profil-sekolah') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('profil-sekolah')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Profil Sekolah
                    </a>


                    {{-- Guru --}}
                    <a
                        href="{{ route('guru.index') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('guru.*')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Guru
                    </a>


                    {{-- Jurusan --}}
                    <a
                        href="{{ route('jurusan.index') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('jurusan.*')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Jurusan
                    </a>


                    {{-- Ekstrakurikuler --}}
                    <a
                        href="{{ route('ekstrakurikuler.index') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('ekstrakurikuler.*')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Ekstrakurikuler
                    </a>


                    {{-- OSIS --}}
                    <a
                        href="{{ route('osis.index') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('osis.index')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        OSIS
                    </a>


                    {{-- Berita --}}
                    <a
                        href="{{ route('berita.index') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('berita.*')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Berita
                    </a>


                    {{-- Galeri --}}
                    <a
                        href="{{ route('galeri.index') }}"
                        class="nav-link rounded px-3
                        {{ request()->routeIs('galeri.*')
                            ? 'active bg-primary bg-opacity-25 text-white fw-bold'
                            : 'text-white-50' }}"
                    >
                        Galeri
                    </a>

                </div>

            </div>

        </div>

    </nav>


    {{-- =========================================================
         KONTEN HALAMAN
    ========================================================= --}}

    <main class="flex-grow-1">

        @yield('content')

    </main>


    {{-- =========================================================
         FOOTER
    ========================================================= --}}

    <footer class="bg-dark text-light pt-5 pb-3">

        <div class="container">

            <div class="row g-5">


                {{-- =================================================
                     INFORMASI SEKOLAH
                ================================================== --}}

                <div class="col-lg-5">

                    {{-- Logo --}}
                    @if ($profil?->logo)

                        <div class="mb-3">

                            <img
                                src="{{ asset('uploads/profil-sekolah/' . $profil->logo) }}"
                                alt="{{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}"
                                class="img-fluid"
                                style="max-height: 70px; object-fit: contain;"
                            >

                        </div>

                    @else

                        <div class="mb-3">

                            <i class="bi bi-mortarboard-fill text-warning fs-1"></i>

                        </div>

                    @endif


                    {{-- Nama Sekolah --}}
                    <h5 class="fw-bold text-white mb-3">

                        {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}

                    </h5>


                    {{-- Deskripsi --}}
                    <p class="text-white-50 mb-0">

                        Website resmi sekolah sebagai pusat informasi mengenai
                        profil, pendidikan, kegiatan, prestasi, dan informasi sekolah.

                    </p>

                </div>


                {{-- =================================================
                     MENU FOOTER
                ================================================== --}}

                <div class="col-md-6 col-lg-3">

                    <h5 class="fw-bold text-white mb-3">
                        Menu
                    </h5>


                    <ul class="list-unstyled mb-0">


                        {{-- Beranda --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('home.beranda') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Beranda
                            </a>

                        </li>


                        {{-- Profil Sekolah --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('profil-sekolah') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Profil Sekolah
                            </a>

                        </li>


                        {{-- Guru --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('guru.index') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Guru
                            </a>

                        </li>


                        {{-- Jurusan --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('jurusan.index') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Jurusan
                            </a>

                        </li>


                        {{-- Ekstrakurikuler --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('ekstrakurikuler.index') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Ekstrakurikuler
                            </a>

                        </li>


                        {{-- OSIS --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('osis.index') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                OSIS
                            </a>

                        </li>


                        {{-- Berita --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('berita.index') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Berita
                            </a>

                        </li>


                        {{-- Galeri --}}
                        <li class="mb-2">

                            <a
                                href="{{ route('galeri.index') }}"
                                class="text-white-50 text-decoration-none"
                            >
                                Galeri
                            </a>

                        </li>

                    </ul>

                </div>


                {{-- =================================================
                     KONTAK SEKOLAH
                ================================================== --}}

                <div class="col-md-6 col-lg-4">

                    <h5 class="fw-bold text-white mb-3">
                        Kontak Sekolah
                    </h5>


                    {{-- Alamat --}}
                    @if ($profil?->alamat_jalan)

                        <div class="d-flex align-items-start mb-3">

                            <i
                                class="bi bi-geo-alt-fill text-warning me-2 mt-1"
                            ></i>

                            <span class="text-white-50">

                                {{ $profil->alamat_jalan }}

                                @if ($profil->desa_kelurahan)
                                    , {{ $profil->desa_kelurahan }}
                                @endif

                                @if ($profil->kecamatan)
                                    , {{ $profil->kecamatan }}
                                @endif

                                @if ($profil->kabupaten_kota)
                                    , {{ $profil->kabupaten_kota }}
                                @endif

                                @if ($profil->provinsi)
                                    , {{ $profil->provinsi }}
                                @endif

                                @if ($profil->kode_pos)
                                    {{ $profil->kode_pos }}
                                @endif

                            </span>

                        </div>

                    @endif


                    {{-- Telepon --}}
                    @if ($profil?->telepon)

                        <div class="d-flex align-items-center mb-3">

                            <i
                                class="bi bi-telephone-fill text-warning me-2"
                            ></i>

                            <span class="text-white-50">
                                {{ $profil->telepon }}
                            </span>

                        </div>

                    @endif


                    {{-- Email --}}
                    @if ($profil?->email)

                        <div class="d-flex align-items-center mb-3">

                            <i
                                class="bi bi-envelope-fill text-warning me-2"
                            ></i>

                            <span class="text-white-50">
                                {{ $profil->email }}
                            </span>

                        </div>

                    @endif


                    {{-- Website --}}
                    @if ($profil?->website)

                        <div class="d-flex align-items-center mb-3">

                            <i
                                class="bi bi-globe2 text-warning me-2"
                            ></i>

                            <span class="text-white-50">
                                {{ $profil->website }}
                            </span>

                        </div>

                    @endif

                </div>

            </div>


            {{-- Garis Footer --}}
            <hr class="border-secondary my-4">


            {{-- Copyright --}}
            <div class="text-center text-white-50">

                <p class="mb-0">

                    &copy; {{ date('Y') }}

                    <strong class="text-white">
                        {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                    </strong>

                    · Semua hak dilindungi.

                </p>

            </div>

        </div>

    </footer>


    {{-- Bootstrap JS --}}
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>


    {{-- JavaScript dari halaman tertentu --}}
    @stack('scripts')

</body>

</html>