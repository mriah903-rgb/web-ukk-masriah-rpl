@extends('layouts.app')

@section('title', 'Guru dan Tenaga Pendidik')

@section('content')

{{-- =========================================================
    HEADER
========================================================= --}}
<section class="bg-dark text-white p-0 m-0">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-people-fill me-1"></i>
                    TENAGA PENDIDIK
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Guru dan Tenaga Pendidik
                </h1>

                <p class="lead text-white-50 mb-0">
                    Mengenal guru dan tenaga pendidik yang berperan
                    dalam mendukung proses pembelajaran di sekolah.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    DAFTAR GURU
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        {{-- JUDUL --}}
        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                TIM PENDIDIK
            </span>

            <p class="text-secondary mb-0">
                Kenali para pendidik yang membimbing dan mendampingi
                siswa dalam proses belajar.
            </p>

        </div>


        {{-- DATA GURU --}}
        <div class="row g-4">

            @forelse($guru as $item)

                {{-- CARD GURU --}}
                <div class="col-lg-3 col-md-4 col-sm-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- FOTO --}}
                        <div class="text-center bg-white pt-4">

                            @if($item->foto)

                                <img
                                    src="{{ asset('storage/' . $item->foto) }}"
                                    alt="{{ $item->nama }}"
                                    width="140"
                                    height="140"
                                    class="rounded-circle border border-3 border-warning"
                                    style="object-fit: cover;"
                                >

                            @else

                                <div
                                    class="rounded-circle bg-dark text-warning d-flex align-items-center justify-content-center mx-auto"
                                    style="width: 140px; height: 140px;"
                                >
                                    <i class="bi bi-person-fill fs-1"></i>
                                </div>

                            @endif

                        </div>


                        {{-- INFORMASI GURU --}}
                        <div class="card-body text-center p-4">

                            {{-- NAMA --}}
                            <h5 class="fw-bold text-primary mb-2">
                                {{ $item->nama }}
                            </h5>


                            {{-- NIP --}}
                            @if($item->nip)

                                <p class="text-secondary small mb-2">
                                    <i class="bi bi-person-vcard text-warning me-1"></i>
                                    NIP. {{ $item->nip }}
                                </p>

                            @endif


                            {{-- JABATAN --}}
                            @if($item->jabatan)

                                <span class="badge bg-dark text-warning px-3 py-2 rounded-pill mb-3">
                                    {{ $item->jabatan }}
                                </span>

                            @endif


                            {{-- MATA PELAJARAN --}}
                            @if($item->mata_pelajaran)

                                <p class="text-secondary small mb-0">
                                    <i class="bi bi-book text-warning me-1"></i>
                                    {{ $item->mata_pelajaran }}
                                </p>

                            @endif

                        </div>


                        {{-- FOOTER CARD --}}
                        <div class="card-footer bg-white border-0 text-center pb-4">

                            <span class="small fw-semibold text-dark d-block mb-3">
                                <i class="bi bi-mortarboard-fill text-warning me-1"></i>
                                Tenaga Pendidik
                            </span>


                            {{-- TOMBOL DETAIL --}}
                            <a
                                href="{{ route('guru.show', $item->id) }}"
                                class="btn btn-dark btn-sm rounded-pill px-4"
                            >
                                Detail
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                {{-- JIKA DATA GURU KOSONG --}}
                <div class="col-12">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body text-center py-5">

                            <div
                                class="bg-dark text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 90px; height: 90px;"
                            >
                                <i class="bi bi-people-fill fs-2"></i>
                            </div>

                            <h5 class="fw-bold text-primary">
                                Data Guru Belum Tersedia
                            </h5>

                            <p class="text-secondary mb-0">
                                Data guru dan tenaga pendidik belum tersedia.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection