@extends('layouts.app')

@section('title', $ekstrakurikuler->nama_ekskul . ' - Ekstrakurikuler')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<section class="bg-dark text-white p-0 m-0">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-stars me-1"></i>
                    EKSTRAKURIKULER
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    {{ $ekstrakurikuler->nama_ekskul }}
                </h1>

                <p class="lead text-white-50 mb-0">
                    Informasi lengkap mengenai kegiatan ekstrakurikuler
                    di SMK Negeri 1 Cijati.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    DETAIL EKSTRAKURIKULER
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center g-4">

            {{-- FOTO --}}
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">

                    @if($ekstrakurikuler->foto)

                        <img
                            src="{{ asset('storage/' . $ekstrakurikuler->foto) }}"
                            alt="{{ $ekstrakurikuler->nama_ekskul }}"
                            class="w-100"
                            style="height: 350px; object-fit: contain;"
                        >

                    @else

                        <div
                            class="bg-dark text-warning d-flex align-items-center justify-content-center"
                            style="height: 350px;"
                        >
                            <i class="bi bi-stars" style="font-size: 6rem;"></i>
                        </div>

                    @endif

                </div>

            </div>


            {{-- INFORMASI --}}
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body p-4 p-lg-5">

                        {{-- JUDUL --}}
                        <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                            INFORMASI EKSTRAKURIKULER
                        </span>

                        <h2 class="fw-bold text-primary mb-4">
                            {{ $ekstrakurikuler->nama_ekskul }}
                        </h2>


                        {{-- PEMBINA --}}
                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">

                                <i class="bi bi-person-badge-fill text-warning me-2"></i>

                                Pembina

                            </div>

                            <div class="col-sm-8 fw-semibold text-dark">

                                {{ $ekstrakurikuler->pembina }}

                            </div>

                        </div>


                        {{-- DESKRIPSI --}}
                        @if($ekstrakurikuler->deskripsi)

                            <div class="py-4">

                                <h5 class="fw-bold text-dark mb-3">

                                    <i class="bi bi-info-circle-fill text-warning me-2"></i>

                                    Deskripsi

                                </h5>

                                <p class="text-secondary mb-0">
                                    {{ $ekstrakurikuler->deskripsi }}
                                </p>

                            </div>

                        @endif


                        {{-- KETERANGAN --}}
                        <div class="border-top pt-4">

                            <div class="d-flex align-items-center">

                                <div class="bg-dark text-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                     style="width: 45px; height: 45px;">

                                    <i class="bi bi-check-circle-fill"></i>

                                </div>

                                <div>

                                    <h6 class="fw-bold mb-1">
                                        Kegiatan Siswa
                                    </h6>

                                    <small class="text-secondary">
                                        Kegiatan untuk mengembangkan minat,
                                        bakat, dan potensi siswa.
                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- TOMBOL KEMBALI --}}
                        <div class="mt-4">

                            <a
                                href="{{ route('ekstrakurikuler.index') }}"
                                class="btn btn-dark px-4 rounded-pill"
                            >
                                <i class="bi bi-arrow-left me-1"></i>
                                Kembali ke Ekstrakurikuler
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection