@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

@if ($profil)

    {{-- =========================================================
         BANNER TENTANG SEKOLAH
    ========================================================== --}}

    <section class="bg-dark text-white p-0 m-0">

        <div class="container py-5">

            <div class="row align-items-center g-4">

                {{-- Logo Sekolah --}}

                <div class="col-md-3 text-center text-md-start">

                    @if ($profil->logo)

                        <img
                            src="{{ asset('uploads/profil-sekolah/' . $profil->logo) }}"
                            alt="Logo {{ $profil->nama_sekolah }}"
                            width="150"
                            height="150"
                            class="bg-white rounded-circle p-2 border border-3 border-warning"
                            style="object-fit: contain;"
                        >

                    @else

                        <div
                            class="bg-white text-primary rounded-circle
                                   d-inline-flex align-items-center
                                   justify-content-center
                                   border border-3 border-warning"
                            style="width: 150px; height: 150px;"
                        >

                            <i class="bi bi-mortarboard-fill display-4"></i>

                        </div>

                    @endif

                </div>


                {{-- Informasi Sekolah --}}

                <div class="col-md-9">

                    <span class="badge bg-warning text-dark px-3 py-2 mb-3">

                        <i class="bi bi-building me-1"></i>

                        TENTANG SEKOLAH

                    </span>


                    <h1 class="display-5 fw-bold mb-2">

                        {{ $profil->nama_sekolah }}

                    </h1>


                    <p class="lead text-white-50 mb-0">

                        Informasi mengenai identitas, visi, misi,
                        sejarah, dan kontak sekolah.

                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         KEPALA SEKOLAH
    ========================================================== --}}

    <section class="bg-light py-5">

        <div class="container">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-body text-center p-4 p-md-5">

                    {{-- Label --}}

                    <span class="badge bg-warning text-dark px-3 py-2 mb-3">

                        <i class="bi bi-person-badge me-1"></i>

                        PIMPINAN SEKOLAH

                    </span>


                    {{-- Foto Kepala Sekolah --}}

                    <div class="mb-4">

                        <img
                            src="{{ asset('image.png') }}"
                            alt="Foto Kepala Sekolah SMKN 1 Cijati"
                            class="rounded-4 border border-3 border-warning shadow-sm"
                            style="
                                width: 160px;
                                height: 190px;
                                object-fit: cover;
                            "
                        >

                    </div>


                    {{-- Jabatan --}}

                    <h2 class="fw-bold text-primary mb-2">

                        Kepala Sekolah

                    </h2>


                    {{-- Nama Kepala Sekolah --}}

                    <h4 class="fw-semibold text-dark mb-2">

                        {{ $profil->kepala_sekolah ?? '-' }}

                    </h4>


                    <p class="text-secondary mb-0">

                        Pimpinan {{ $profil->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}

                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         IDENTITAS + VISI & MISI
    ========================================================== --}}

    <section class="py-5 bg-light">

        <div class="container">

            <div class="row g-4">


                {{-- =================================================
                     IDENTITAS SEKOLAH
                ================================================== --}}

                <div class="col-lg-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">

                            <div class="d-flex align-items-center mb-4">

                                <div
                                    class="bg-dark text-warning rounded-circle
                                           d-flex align-items-center
                                           justify-content-center me-3"
                                    style="width: 50px; height: 50px;"
                                >

                                    <i class="bi bi-building fs-5"></i>

                                </div>


                                <h3 class="fw-bold text-primary mb-0">

                                    Identitas Sekolah

                                </h3>

                            </div>


                            {{-- NPSN --}}

                            <div class="d-flex mb-3">

                                <i class="bi bi-upc-scan text-warning fs-4 me-3"></i>

                                <div>

                                    <small class="text-secondary d-block">
                                        NPSN
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profil->npsn ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- Status Sekolah --}}

                            <div class="d-flex mb-3">

                                <i class="bi bi-building text-warning fs-4 me-3"></i>

                                <div>

                                    <small class="text-secondary d-block">
                                        Status Sekolah
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profil->status_sekolah ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- Bentuk Pendidikan --}}

                            <div class="d-flex mb-3">

                                <i class="bi bi-mortarboard-fill text-warning fs-4 me-3"></i>

                                <div>

                                    <small class="text-secondary d-block">
                                        Bentuk Pendidikan
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profil->bentuk_pendidikan ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- Akreditasi --}}

                            <div class="d-flex">

                                <i class="bi bi-award-fill text-warning fs-4 me-3"></i>

                                <div>

                                    <small class="text-secondary d-block">
                                        Akreditasi
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profil->akreditasi ?? '-' }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     VISI & MISI
                ================================================== --}}

                <div class="col-lg-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">


                            {{-- VISI --}}

                            <div class="d-flex align-items-center mb-3">

                                <div
                                    class="bg-dark text-warning rounded-circle
                                           d-flex align-items-center
                                           justify-content-center me-3"
                                    style="width: 45px; height: 45px;"
                                >

                                    <i class="bi bi-eye-fill"></i>

                                </div>


                                <h3 class="fw-bold text-primary mb-0">

                                    Visi

                                </h3>

                            </div>


                            <p class="text-secondary mb-4">

                                {{ $profil->visi ?? 'Belum tersedia.' }}

                            </p>


                            <hr class="my-4">


                            {{-- MISI --}}

                            <div class="d-flex align-items-center mb-3">

                                <div
                                    class="bg-dark text-warning rounded-circle
                                           d-flex align-items-center
                                           justify-content-center me-3"
                                    style="width: 45px; height: 45px;"
                                >

                                    <i class="bi bi-bullseye"></i>

                                </div>


                                <h3 class="fw-bold text-primary mb-0">

                                    Misi

                                </h3>

                            </div>


                            <ol class="ps-4 mb-0 text-secondary">

                                @foreach (
                                    explode(
                                        "\n",
                                        str_replace(
                                            "\r",
                                            "",
                                            $profil->misi ?? ''
                                        )
                                    ) as $point
                                )

                                    @if (trim($point) !== '')

                                        <li class="mb-2">

                                            {{
                                                preg_replace(
                                                    '/^\d+[\.\)]\s*/',
                                                    '',
                                                    trim($point)
                                                )
                                            }}

                                        </li>

                                    @endif

                                @endforeach

                            </ol>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         SEJARAH SEKOLAH
    ========================================================== --}}

    <section class="py-5 bg-white">

        <div class="container">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-md-5">

                    <div class="d-flex align-items-center mb-4">

                        <div
                            class="bg-dark text-warning rounded-circle
                                   d-flex align-items-center
                                   justify-content-center me-3"
                            style="width: 50px; height: 50px;"
                        >

                            <i class="bi bi-clock-history fs-5"></i>

                        </div>


                        <h3 class="fw-bold text-primary mb-0">

                            Sejarah Sekolah

                        </h3>

                    </div>


                    <p class="text-secondary mb-0">

                        {{ $profil->sejarah ?? 'Belum tersedia.' }}

                    </p>

                </div>

            </div>

        </div>

    </section>



    {{-- =========================================================
         ALAMAT DAN KONTAK
    ========================================================== --}}

    <section class="py-5 bg-light">

        <div class="container">

            <div class="text-center mb-5">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">

                    INFORMASI KONTAK

                </span>


                <h2 class="fw-bold text-primary mb-2">

                    Alamat dan Kontak

                </h2>


                <p class="text-secondary mb-0">

                    Informasi kontak resmi sekolah.

                </p>

            </div>


            <div class="row g-4">


                {{-- =================================================
                     ALAMAT SEKOLAH
                ================================================== --}}

                <div class="col-lg-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">

                            <h4 class="fw-bold text-primary mb-4">

                                <i
                                    class="bi bi-geo-alt-fill text-warning me-2"
                                ></i>

                                Alamat Sekolah

                            </h4>


                            <p class="text-secondary mb-2">

                                {{ $profil->alamat_jalan ?? '-' }}

                            </p>


                            <p class="text-secondary mb-0">

                                {{ $profil->desa_kelurahan ?? '-' }},
                                {{ $profil->kecamatan ?? '-' }},
                                {{ $profil->kabupaten_kota ?? '-' }},
                                {{ $profil->provinsi ?? '-' }}

                                {{ $profil->kode_pos ?? '' }}

                            </p>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     KONTAK SEKOLAH
                ================================================== --}}

                <div class="col-lg-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">

                            <h4 class="fw-bold text-primary mb-4">

                                <i
                                    class="bi bi-telephone-fill text-warning me-2"
                                ></i>

                                Kontak

                            </h4>


                            {{-- Telepon --}}

                            <p class="text-secondary mb-3">

                                <i class="bi bi-telephone text-warning me-2"></i>

                                {{ $profil->telepon ?? '-' }}

                            </p>


                            {{-- Email --}}

                            <p class="text-secondary mb-3">

                                <i class="bi bi-envelope text-warning me-2"></i>

                                {{ $profil->email ?? '-' }}

                            </p>


                            {{-- Website --}}

                            <p class="text-secondary mb-0">

                                <i class="bi bi-globe2 text-warning me-2"></i>

                                {{ $profil->website ?? '-' }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


@else

    {{-- =========================================================
         DATA PROFIL BELUM TERSEDIA
    ========================================================== --}}

    <section class="py-5 bg-light">

        <div class="container">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center py-5">

                    <div
                        class="bg-dark text-warning rounded-circle
                               d-inline-flex align-items-center
                               justify-content-center mb-3"
                        style="width: 90px; height: 90px;"
                    >

                        <i class="bi bi-building fs-2"></i>

                    </div>


                    <h5 class="fw-bold text-primary">

                        Data Profil Sekolah Belum Tersedia

                    </h5>


                    <p class="text-secondary mb-0">

                        Silakan lengkapi data profil sekolah terlebih dahulu.

                    </p>

                </div>

            </div>

        </div>

    </section>

@endif

@endsection