@extends('layouts.app')

@section('title', 'Berita Sekolah')

@section('content')

{{-- ========================= --}}
{{-- HERO --}}
{{-- ========================= --}}
<section class="bg-dark text-white p-0 m-0">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    <i class="bi bi-newspaper me-1"></i>
                    INFORMASI SEKOLAH
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Berita Sekolah
                </h1>

                <p class="lead text-white-50 mb-0">
                    Informasi dan berita terbaru dari sekolah.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- ========================= --}}
{{-- DAFTAR BERITA --}}
{{-- ========================= --}}
<section class="py-5 bg-light">

    <div class="container">

        {{-- Judul Section --}}
        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                BERITA TERKINI
            </span>

            <p class="text-secondary mb-0">
                Simak berbagai informasi dan kegiatan terbaru
                dari sekolah.
            </p>

        </div>


        {{-- ========================= --}}
        {{-- CARD BERITA --}}
        {{-- ========================= --}}
        <div class="row g-4">

            @forelse ($beritas as $berita)

                <div class="col-lg-4 col-md-6">

                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">


                        {{-- ========================= --}}
                        {{-- GAMBAR --}}
                        {{-- ========================= --}}
                        @if ($berita->gambar)

                            <div class="ratio ratio-1x1 bg-light overflow-hidden">

                                <img
                                    src="{{ asset('storage/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}"
                                    class="w-100 h-100 object-fit-contain"
                                >

                            </div>

                        @endif


                        {{-- ========================= --}}
                        {{-- VIDEO --}}
                        {{-- ========================= --}}
                        @if ($berita->video)

                            <div class="ratio ratio-16x9 bg-dark">

                                <video
                                    controls
                                    preload="metadata"
                                    class="w-100 h-100"
                                >

                                    <source
                                        src="{{ asset('storage/' . $berita->video) }}"
                                    >

                                    Browser Anda tidak mendukung pemutaran video.

                                </video>

                            </div>

                        @endif


                        {{-- ========================= --}}
                        {{-- PLACEHOLDER --}}
                        {{-- ========================= --}}
                        @if (!$berita->gambar && !$berita->video)

                            <div class="ratio ratio-1x1 bg-dark text-warning d-flex align-items-center justify-content-center">

                                <i class="bi bi-newspaper fs-1"></i>

                            </div>

                        @endif


                        {{-- ========================= --}}
                        {{-- ISI CARD --}}
                        {{-- ========================= --}}
                        <div class="card-body p-4">

                            {{-- Tanggal --}}
                            <small class="text-secondary d-block mb-2">

                                <i class="bi bi-calendar3 text-warning me-1"></i>

                                {{ $berita->created_at->format('d M Y') }}

                            </small>


                            {{-- Label Video --}}
                            @if ($berita->video)

                                <span class="badge bg-dark mb-2">

                                    <i class="bi bi-camera-video me-1"></i>
                                    Video

                                </span>

                            @endif


                            {{-- Judul --}}
                            <h5 class="fw-bold text-primary mb-3">

                                {{ $berita->judul }}

                            </h5>


                            {{-- Ringkasan --}}
                            <p class="text-secondary small mb-0">

                                {{ Str::limit(strip_tags($berita->isi), 150) }}

                            </p>

                        </div>


                        {{-- ========================= --}}
                        {{-- FOOTER --}}
                        {{-- ========================= --}}
                        <div class="card-footer bg-dark border-0 p-4">

                            <a
                                href="{{ route('berita.show', $berita->slug) }}"
                                class="btn btn-warning w-100 fw-semibold"
                            >

                                <i class="bi bi-arrow-right ms-1"></i>
                                Lihat Detail

                            </a>

                        </div>

                    </div>

                </div>


            @empty

                {{-- ========================= --}}
                {{-- JIKA BELUM ADA BERITA --}}
                {{-- ========================= --}}
                <div class="col-12">

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body text-center py-5">

                            <div
                                class="bg-dark text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 90px; height: 90px;"
                            >

                                <i class="bi bi-newspaper fs-2"></i>

                            </div>

                            <h5 class="fw-bold text-primary">
                                Belum Ada Berita
                            </h5>

                            <p class="text-secondary mb-0">
                                Belum ada berita yang dipublikasikan.
                            </p>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection