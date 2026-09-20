@extends('layouts.app')

@section('title', $jurusan->nama_jurusan . ' - Jurusan')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<section class="bg-dark text-white p-0 m-0">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-mortarboard-fill me-1"></i>
                    PROGRAM KEAHLIAN
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    {{ $jurusan->nama_jurusan }}
                </h1>

                <p class="lead text-white-50 mb-0">
                    Informasi lengkap mengenai program keahlian
                    di SMK Negeri 1 Cijati.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    DETAIL JURUSAN
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center g-4">

            {{-- =================================================
                LOGO JURUSAN
            ================================================= --}}
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                    <div class="card-body text-center p-4 p-lg-5">

                        @if($jurusan->logo)

                            <img
                                src="{{ asset('storage/' . $jurusan->logo) }}"
                                alt="{{ $jurusan->nama_jurusan }}"
                                width="250"
                                height="250"
                                class="rounded-circle border border-4 border-warning"
                                style="object-fit: contain;"
                            >

                        @else

                            <div
                                class="bg-dark text-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                                style="width: 250px; height: 250px;"
                            >
                                <i
                                    class="bi bi-building"
                                    style="font-size: 7rem;"
                                ></i>
                            </div>

                        @endif


                        <h3 class="fw-bold text-primary mt-4 mb-2">
                            {{ $jurusan->nama_jurusan }}
                        </h3>


                        @if($jurusan->singkatan)

                            <span class="badge bg-dark text-warning px-3 py-2 rounded-pill">
                                {{ $jurusan->singkatan }}
                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- =================================================
                INFORMASI JURUSAN
            ================================================= --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 p-lg-5">

                        <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                            INFORMASI JURUSAN
                        </span>


                        <h2 class="fw-bold text-primary mb-4">
                            {{ $jurusan->nama_jurusan }}
                        </h2>


                        {{-- KODE JURUSAN --}}
                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">

                                <i class="bi bi-upc-scan text-warning me-2"></i>

                                Kode Jurusan

                            </div>

                            <div class="col-sm-8 fw-semibold text-dark">

                                {{ $jurusan->kode_jurusan }}

                            </div>

                        </div>


                        {{-- SINGKATAN --}}
                        @if($jurusan->singkatan)

                            <div class="row border-bottom py-3">

                                <div class="col-sm-4 fw-semibold text-secondary">

                                    <i class="bi bi-bookmark-fill text-warning me-2"></i>

                                    Singkatan

                                </div>

                                <div class="col-sm-8 fw-semibold text-dark">

                                    {{ $jurusan->singkatan }}

                                </div>

                            </div>

                        @endif


                        {{-- DESKRIPSI --}}
                        @if($jurusan->deskripsi)

                            <div class="py-4">

                                <h5 class="fw-bold text-dark mb-3">

                                    <i class="bi bi-info-circle-fill text-warning me-2"></i>

                                    Deskripsi

                                </h5>

                                <p class="text-secondary mb-0">
                                    {{ $jurusan->deskripsi }}
                                </p>

                            </div>

                        @endif


                        {{-- INFORMASI TAMBAHAN --}}
                        <div class="border-top pt-4">

                            <div class="d-flex align-items-center">

                                <div
                                    class="bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;"
                                >

                                    <i class="bi bi-mortarboard-fill"></i>

                                </div>

                                <div>

                                    <h6 class="fw-bold mb-1">
                                        Program Keahlian
                                    </h6>

                                    <small class="text-secondary">
                                        Program keahlian untuk mengembangkan
                                        pengetahuan, keterampilan, dan potensi siswa.
                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- TOMBOL KEMBALI --}}
                        <div class="mt-4">

                            <a
                                href="{{ route('jurusan.index') }}"
                                class="btn btn-dark px-4 rounded-pill"
                            >
                                <i class="bi bi-arrow-left me-1"></i>
                                Kembali ke Jurusan
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection