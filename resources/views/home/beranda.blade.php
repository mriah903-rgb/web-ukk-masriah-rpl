@extends('layouts.app')

@section('title', 'Beranda - ' . ($profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati'))

@section('content')

{{-- =========================================================
     HERO / BANNER
========================================================= --}}

<section class="hero-section position-relative overflow-hidden">

    <div
        id="heroCarousel"
        class="carousel slide"
        data-bs-ride="carousel"
        data-bs-interval="5000"
    >

        {{-- =================================================
             DATA BANNER
        ================================================== --}}

        @if (isset($banners) && $banners->count() > 0)

            <div class="carousel-inner">

                @foreach ($banners as $banner)

                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                        @if ($banner->gambar)

                            <div class="position-relative">

                                {{-- Gambar Banner --}}
                                <img
                                    src="{{ asset('uploads/banner/' . $banner->gambar) }}"
                                    class="d-block w-100"
                                    style="height: 650px; object-fit: cover;"
                                    alt="{{ $banner->judul ?? 'Banner Sekolah' }}"
                                    loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                                >

                                {{-- Overlay --}}
                                <div
                                    class="position-absolute top-0 start-0 w-100 h-100"
                                    style="
                                        background:
                                        linear-gradient(
                                            90deg,
                                            rgba(0, 46, 92, .90),
                                            rgba(0, 66, 130, .55),
                                            rgba(0, 46, 92, .20)
                                        );
                                    "
                                ></div>

                            </div>

                        @else

                            <div
                                class="d-flex align-items-center"
                                style="
                                    height: 650px;
                                    background: var(--biru-tua);
                                "
                            ></div>

                        @endif

                    </div>

                @endforeach

            </div>


            {{-- =================================================
                 INDICATOR CAROUSEL
            ================================================== --}}

            @if ($banners->count() > 1)

                <div class="carousel-indicators">

                    @foreach ($banners as $banner)

                        <button
                            type="button"
                            data-bs-target="#heroCarousel"
                            data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}"
                            aria-current="{{ $loop->first ? 'true' : 'false' }}"
                            aria-label="Banner {{ $loop->iteration }}"
                        ></button>

                    @endforeach

                </div>


                {{-- Tombol Sebelumnya --}}
                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide="prev"
                >

                    <span class="carousel-control-prev-icon"></span>

                    <span class="visually-hidden">
                        Sebelumnya
                    </span>

                </button>


                {{-- Tombol Berikutnya --}}
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#heroCarousel"
                    data-bs-slide="next"
                >

                    <span class="carousel-control-next-icon"></span>

                    <span class="visually-hidden">
                        Berikutnya
                    </span>

                </button>

            @endif

        @else

            {{-- =================================================
                 BANNER DEFAULT
            ================================================== --}}

            <div class="carousel-inner">

                <div
                    class="carousel-item active d-flex align-items-center"
                    style="
                        height: 650px;
                        background: var(--biru-tua);
                    "
                >

                    <div class="container">

                        <div class="text-white">

                            <span class="badge text-bg-warning mb-3">
                                WEBSITE RESMI SEKOLAH
                            </span>

                            <h1 class="display-4 fw-bold">
                                {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
                            </h1>

                        </div>

                    </div>

                </div>

            </div>

        @endif


        {{-- =================================================
             TEXT HERO
        ================================================== --}}

        <div
            class="position-absolute top-50 start-0 translate-middle-y w-100"
            style="z-index: 3;"
        >

            <div class="container">

                <div class="row">

                    <div class="col-lg-8">

                        {{-- Label --}}
                        <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                            SELAMAT DATANG DI WEBSITE RESMI
                        </span>


                        {{-- Judul --}}
                        <h1 class="display-4 fw-bold text-white mb-3">

                            {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}

                        </h1>


                        {{-- Deskripsi --}}
                        <p class="lead text-white-50 mb-4">

                            Menjadi pusat informasi sekolah yang menyajikan
                            profil, pendidikan, kegiatan, prestasi, dan berbagai
                            informasi terbaru untuk seluruh warga sekolah.

                        </p>


                        {{-- Tombol --}}
                        <div class="d-flex flex-wrap gap-2">

                            <a
                                href="{{ route('profil-sekolah') }}"
                                class="btn btn-warning btn-lg fw-semibold px-4"
                            >

                                Kenali Sekolah Kami

                                <i class="bi bi-arrow-right ms-2"></i>

                            </a>


                            <a
                                href="{{ route('berita.index') }}"
                                class="btn btn-outline-light btn-lg fw-semibold px-4"
                            >

                                Informasi Terbaru

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         GELOMBANG HERO
    ========================================================= --}}

    <div class="hero-wave">

        <svg
            viewBox="0 0 1440 120"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
        >

            <path
                d="
                    M0,55
                    C180,115 360,115 540,55
                    C720,-5 900,-5 1080,55
                    C1260,115 1350,115 1440,55
                    L1440,120
                    L0,120
                    Z
                "
                fill="#f8f9fa"
            />

        </svg>

    </div>

</section>


{{-- =========================================================
     INFORMASI SINGKAT
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="row g-4 mt-n5 position-relative" style="z-index: 10;">


            {{-- Pendidikan --}}
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 interactive-card">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div
                                class="icon-box rounded-3 d-flex align-items-center justify-content-center me-3"
                                style="
                                    width: 55px;
                                    height: 55px;
                                    background: var(--emas-muda);
                                    color: var(--biru);
                                "
                            >

                                <i class="bi bi-mortarboard-fill fs-4"></i>

                            </div>

                            <h5 class="fw-bold mb-0">
                                Pendidikan
                            </h5>

                        </div>

                        <p class="text-secondary mb-0">

                            Mewujudkan pendidikan yang berkualitas
                            untuk mengembangkan potensi peserta didik.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Kegiatan Siswa --}}
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 interactive-card">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div
                                class="icon-box rounded-3 d-flex align-items-center justify-content-center me-3"
                                style="
                                    width: 55px;
                                    height: 55px;
                                    background: var(--emas-muda);
                                    color: var(--biru);
                                "
                            >

                                <i class="bi bi-people-fill fs-4"></i>

                            </div>

                            <h5 class="fw-bold mb-0">
                                Kegiatan Siswa
                            </h5>

                        </div>

                        <p class="text-secondary mb-0">

                            Berbagai kegiatan akademik dan nonakademik
                            untuk mengembangkan minat dan bakat siswa.

                        </p>

                    </div>

                </div>

            </div>


            {{-- Prestasi --}}
            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100 interactive-card">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div
                                class="icon-box rounded-3 d-flex align-items-center justify-content-center me-3"
                                style="
                                    width: 55px;
                                    height: 55px;
                                    background: var(--emas-muda);
                                    color: var(--biru);
                                "
                            >

                                <i class="bi bi-trophy-fill fs-4"></i>

                            </div>

                            <h5 class="fw-bold mb-0">
                                Prestasi
                            </h5>

                        </div>

                        <p class="text-secondary mb-0">

                            Mendukung peserta didik untuk berkembang,
                            berkarya, dan meraih prestasi.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     PROFIL SEKOLAH
========================================================= --}}

<section id="profil" class="py-5">

    <div class="container">

        <div class="row align-items-center g-5">


            {{-- Logo --}}
            <div class="col-lg-5 text-center">

                @if ($profil?->logo)

                    <div class="card border-0 shadow-sm rounded-4 p-4">

                        <img
                            src="{{ asset('uploads/profil-sekolah/' . $profil->logo) }}"
                            alt="{{ $profil->nama_sekolah }}"
                            class="img-fluid"
                            style="
                                max-height: 280px;
                                object-fit: contain;
                            "
                        >

                    </div>

                @else

                    <div
                        class="card border-0 shadow-sm rounded-4 d-flex align-items-center justify-content-center"
                        style="height: 280px;"
                    >

                        <i class="bi bi-building text-primary display-1"></i>

                    </div>

                @endif

            </div>


            {{-- Informasi --}}
            <div class="col-lg-7">

                <span class="badge bg-warning text-dark mb-3 px-3 py-2">
                    TENTANG SEKOLAH
                </span>


                <h2 class="fw-bold text-primary mb-3">

                    {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}

                </h2>


                @if ($profil?->sejarah)

                    <p class="text-secondary">

                        {{ \Illuminate\Support\Str::limit(
                            strip_tags($profil->sejarah),
                            500
                        ) }}

                    </p>

                @else

                    <p class="text-secondary">

                        SMK Negeri 1 Cijati merupakan satuan pendidikan
                        yang berkomitmen dalam memberikan pendidikan
                        berkualitas serta mengembangkan potensi peserta
                        didik agar mampu berkembang dan berprestasi.

                    </p>

                @endif


                {{-- Data Sekolah --}}
                <div class="row g-3 mt-3">

                    @if ($profil?->npsn)

                        <div class="col-sm-6">

                            <div class="card border-0 bg-light rounded-3 h-100">

                                <div class="card-body">

                                    <small class="text-secondary">
                                        NPSN
                                    </small>

                                    <div class="fw-bold text-primary">
                                        {{ $profil->npsn }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif


                    @if ($profil?->status_sekolah)

                        <div class="col-sm-6">

                            <div class="card border-0 bg-light rounded-3 h-100">

                                <div class="card-body">

                                    <small class="text-secondary">
                                        Status Sekolah
                                    </small>

                                    <div class="fw-bold text-primary">
                                        {{ $profil->status_sekolah }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif


                    @if ($profil?->akreditasi)

                        <div class="col-sm-6">

                            <div class="card border-0 bg-light rounded-3 h-100">

                                <div class="card-body">

                                    <small class="text-secondary">
                                        Akreditasi
                                    </small>

                                    <div class="fw-bold text-primary">
                                        {{ $profil->akreditasi }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif


                    @if ($profil?->kepala_sekolah)

                        <div class="col-sm-6">

                            <div class="card border-0 bg-light rounded-3 h-100">

                                <div class="card-body">

                                    <small class="text-secondary">
                                        Kepala Sekolah
                                    </small>

                                    <div class="fw-bold text-primary">
                                        {{ $profil->kepala_sekolah }}
                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif

                </div>


                {{-- Tombol --}}
                <a
                    href="{{ route('profil-sekolah') }}"
                    class="btn btn-primary mt-4 px-4 btn-interactive"
                >

                    Lihat Profil Sekolah

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     VISI & MISI
========================================================= --}}

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                ARAH SEKOLAH
            </span>

            <h2 class="fw-bold text-primary">
                Visi & Misi
            </h2>

            <p
                class="text-secondary mx-auto"
                style="max-width: 700px;"
            >

                Landasan dan arah pengembangan
                {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}.

            </p>

        </div>


        <div class="row g-4">


            {{-- Visi --}}
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 p-lg-5">

                        <div
                            class="icon-box rounded-3 d-flex align-items-center justify-content-center mb-4"
                            style="
                                width: 60px;
                                height: 60px;
                                background: var(--emas-muda);
                                color: var(--biru);
                            "
                        >

                            <i class="bi bi-eye-fill fs-3"></i>

                        </div>


                        <h4 class="fw-bold text-primary mb-3">
                            Visi
                        </h4>


                        @if ($profil?->visi)

                            <p class="text-secondary mb-0">
                                {{ $profil->visi }}
                            </p>

                        @else

                            <p class="text-secondary mb-0">
                                Data visi sekolah belum ditambahkan.
                            </p>

                        @endif

                    </div>

                </div>

            </div>


            {{-- Misi --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 p-lg-5">

                        <div
                            class="icon-box rounded-3 d-flex align-items-center justify-content-center mb-4"
                            style="
                                width: 60px;
                                height: 60px;
                                background: #eaf2fb;
                                color: var(--biru);
                            "
                        >

                            <i class="bi bi-list-check fs-3"></i>

                        </div>


                        <h4 class="fw-bold text-primary mb-3">
                            Misi
                        </h4>


                        @if ($profil?->misi)

                            <p class="text-secondary mb-0">
                                {{ $profil->misi }}
                            </p>

                        @else

                            <p class="text-secondary mb-0">
                                Data misi sekolah belum ditambahkan.
                            </p>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     BERITA TERBARU
========================================================= --}}

<section id="berita" class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                INFORMASI TERBARU
            </span>

            <h2 class="fw-bold text-primary">
                Berita Terbaru
            </h2>

            <p
                class="text-secondary mx-auto"
                style="max-width: 700px;"
            >

                Informasi dan kabar terbaru dari
                {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}.

            </p>

        </div>


        <div class="row g-4">

            @forelse ($beritas as $berita)

                <div class="col-md-6 col-lg-4">

                    <div
                        class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 interactive-card"
                    >

                        {{-- Gambar --}}
                        @if ($berita->gambar)

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                class="card-img-top"
                                style="
                                    height: 220px;
                                    object-fit: cover;
                                "
                                alt="{{ $berita->judul }}"
                                loading="lazy"
                            >

                        @else

                            <div
                                class="d-flex align-items-center justify-content-center bg-light text-primary"
                                style="height: 220px;"
                            >

                                <i class="bi bi-newspaper display-3"></i>

                            </div>

                        @endif


                        {{-- Isi --}}
                        <div class="card-body p-4">

                            <small class="text-warning fw-semibold">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ $berita->created_at?->format('d M Y') }}

                            </small>


                            <h5 class="fw-bold text-primary mt-2">

                                {{ $berita->judul }}

                            </h5>


                            <p class="text-secondary small mb-0">

                                {{ \Illuminate\Support\Str::limit(
                                    strip_tags($berita->isi ?? ''),
                                    120
                                ) }}

                            </p>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="text-center py-5">

                        <i class="bi bi-newspaper display-3 text-secondary"></i>

                        <p class="text-secondary mt-3 mb-0">

                            Belum ada berita yang ditambahkan.

                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- Tombol Semua Berita --}}
        @if (isset($beritas) && $beritas->count() > 0)

            <div class="text-center mt-5">

                <a
                    href="{{ route('berita.index') }}"
                    class="btn btn-primary px-4 btn-interactive"
                >

                    Lihat Semua Berita

                    <i class="bi bi-arrow-right ms-2"></i>

                </a>

            </div>

        @endif

    </div>

</section>

@endsection