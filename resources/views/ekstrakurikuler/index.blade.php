@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

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
                    KEGIATAN SEKOLAH
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Ekstrakurikuler
                </h1>

                <p class="lead text-white-50 mb-0">
                    Berbagai kegiatan ekstrakurikuler yang tersedia
                    untuk mengembangkan minat, bakat, dan potensi siswa.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    DAFTAR EKSTRAKURIKULER
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        {{-- JUDUL --}}
        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                EKSTRAKURIKULER
            </span>

            <p class="text-secondary mb-0">
                Temukan ekstrakurikuler yang sesuai dengan minat dan bakat kamu.
            </p>

        </div>


        {{-- DATA EKSTRAKURIKULER --}}
        <div class="row g-4">

            @forelse($ekstrakurikuler as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- FOTO --}}
                        @if($item->foto)

                            <img
                                src="{{ asset('storage/' . $item->foto) }}"
                                class="card-img-top"
                                alt="{{ $item->nama_ekskul }}"
                                style="height: 220px; object-fit: contain;"
                            >

                        @else

                            <div
                                class="bg-dark text-warning d-flex align-items-center justify-content-center"
                                style="height: 220px;"
                            >
                                <i class="bi bi-stars fs-1"></i>
                            </div>

                        @endif


                        {{-- INFORMASI --}}
                        <div class="card-body p-4">

                            <h4 class="fw-bold text-primary mb-3">
                                {{ $item->nama_ekskul }}
                            </h4>


                            {{-- PEMBINA --}}
                            <div class="d-flex align-items-center mb-3">

                                <div class="me-2 text-warning">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>

                                <div>

                                    <small class="text-secondary d-block">
                                        Pembina
                                    </small>

                                    <span class="fw-semibold text-dark">
                                        {{ $item->pembina }}
                                    </span>

                                </div>

                            </div>


                            {{-- DESKRIPSI --}}
                            @if($item->deskripsi)

                                <p class="text-secondary small mb-0">
                                    {{ $item->deskripsi }}
                                </p>

                            @endif

                        </div>


                        {{-- FOOTER --}}
                        <div class="card-footer bg-white border-0 px-4 pb-4">

                            <div class="d-flex align-items-center justify-content-between">

                                {{-- LABEL --}}
                                <span class="small fw-semibold text-dark">

                                    <i class="bi bi-check-circle-fill text-warning me-1"></i>

                                    Kegiatan Siswa

                                </span>


                                {{-- TOMBOL DETAIL --}}
                                <a
                                    href="{{ route('ekstrakurikuler.show', $item->id) }}"
                                    class="btn btn-dark btn-sm rounded-pill px-3"
                                >
                                    Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                {{-- DATA KOSONG --}}
                <div class="col-12">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body text-center py-5">

                            <div
                                class="bg-dark text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 90px; height: 90px;"
                            >
                                <i class="bi bi-stars fs-2"></i>
                            </div>

                            <h5 class="fw-bold text-primary">
                                Belum Ada Ekstrakurikuler
                            </h5>

                            <p class="text-secondary mb-0">
                                Data ekstrakurikuler belum tersedia.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection