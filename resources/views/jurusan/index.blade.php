@extends('layouts.app')

@section('title', 'Jurusan')

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
                    Jurusan
                </h1>

                <p class="lead text-white-50 mb-0">
                    Program keahlian yang tersedia di sekolah
                    untuk mengembangkan potensi dan keterampilan siswa.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
    DAFTAR JURUSAN
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container">

        {{-- JUDUL --}}
        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                PILIHAN PROGRAM
            </span>

            <p class="text-secondary mx-auto mb-0">
                Kenali program keahlian yang tersedia dan pilih
                bidang yang sesuai dengan minat serta potensi kamu.
            </p>

        </div>


        {{-- DATA JURUSAN --}}
        <div class="row g-4">

            @forelse($jurusan as $item)

                <div class="col-md-6 col-lg-4">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                        {{-- LOGO --}}
                        <div class="bg-white text-center p-4">

                            @if($item->logo)

                                <img
                                    src="{{ asset('storage/' . $item->logo) }}"
                                    alt="{{ $item->nama_jurusan }}"
                                    width="120"
                                    height="120"
                                    class="rounded-circle border border-3 border-warning mb-3"
                                    style="object-fit: contain;"
                                >

                            @else

                                <div
                                    class="bg-dark text-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                                    style="width: 120px; height: 120px;"
                                >
                                    <i class="bi bi-building fs-1"></i>
                                </div>

                            @endif

                        </div>


                        {{-- INFORMASI JURUSAN --}}
                        <div class="card-body text-center p-4">

                            <h4 class="fw-bold text-primary mb-2">
                                {{ $item->nama_jurusan }}
                            </h4>


                            {{-- SINGKATAN --}}
                            @if($item->singkatan)

                                <span class="badge bg-dark text-warning px-3 py-2 rounded-pill mb-3">
                                    {{ $item->singkatan }}
                                </span>

                            @endif


                            {{-- KODE JURUSAN --}}
                            <div class="d-flex justify-content-center align-items-center gap-2 text-secondary mb-3">

                                <i class="bi bi-upc-scan text-warning"></i>

                                <span>
                                    Kode: {{ $item->kode_jurusan }}
                                </span>

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

                                <span class="small fw-semibold text-dark">

                                    <i class="bi bi-check-circle-fill text-warning me-1"></i>

                                    Program Keahlian

                                </span>


                                {{-- TOMBOL DETAIL --}}
                                <a
                                    href="{{ route('jurusan.show', $item->id) }}"
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
                                <i class="bi bi-building fs-2"></i>
                            </div>

                            <h5 class="fw-bold text-primary">
                                Belum Ada Data Jurusan
                            </h5>

                            <p class="text-secondary mb-0">
                                Data program keahlian belum tersedia.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection