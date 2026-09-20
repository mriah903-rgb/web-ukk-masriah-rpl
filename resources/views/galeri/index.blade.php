@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

    {{-- Hero --}}
    <section class="bg-dark text-white p-0 m-0">

        <div class="container py-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                        <i class="bi bi-images me-1"></i>
                        DOKUMENTASI SEKOLAH
                    </span>

                    <h1 class="display-5 fw-bold mb-3">
                        Galeri
                    </h1>

                    <p class="lead text-white-50 mb-0">
                        Dokumentasi kegiatan dan gedung-gedung sekolah
                        yang menyimpan banyak cerita dan kenangan
                        selama masa sekolah.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- Daftar Galeri --}}
    <section class="py-5 bg-light">

        <div class="container">

            {{-- Judul Section --}}
            <div class="text-center mb-5">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    GALERI SEKOLAH
                </span>

                <p class="text-secondary mb-0">
                    Tempat-tempat kecil yang mungkin sederhana,
                    tetapi menyimpan banyak kenangan selama di sekolah.
                </p>

            </div>


            {{-- Card Galeri --}}
            <div class="row g-4">

                @forelse ($galeri as $item)

                    <div class="col-md-6 col-lg-4">

                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                            {{-- Gambar --}}
                            @if ($item->foto)

                                <img
                                    src="{{ asset('storage/' . $item->foto) }}"
                                    alt="{{ $item->judul }}"
                                    class="card-img-top"
                                    style="height: 240px; object-fit: cover;">

                            @else

                                <div
                                    class="bg-dark text-warning d-flex align-items-center justify-content-center"
                                    style="height: 240px;">

                                    <i class="bi bi-images fs-1"></i>

                                </div>

                            @endif


                            {{-- Isi Card --}}
                            <div class="card-body p-4">

                                <h5 class="fw-bold text-primary mb-3">
                                    {{ $item->judul }}
                                </h5>

                                @if ($item->keterangan)

                                    <p class="text-secondary small mb-0">
                                        {{ $item->keterangan }}
                                    </p>

                                @else

                                    <p class="text-secondary small mb-0">
                                        Tidak ada keterangan.
                                    </p>

                                @endif

                            </div>


                            {{-- Tombol Detail --}}
                            <div class="card-footer bg-dark border-0 p-4">

                                <a
                                    href="{{ route('galeri.show', $item->id) }}"
                                    class="btn btn-warning w-100 fw-semibold">

                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>

                                </a>

                            </div>

                        </div>

                    </div>


                @empty

                    {{-- Jika Belum Ada Galeri --}}
                    <div class="col-12">

                        <div class="card border-0 shadow-sm rounded-4">

                            <div class="card-body text-center py-5">

                                <div
                                    class="bg-dark text-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 90px; height: 90px;">

                                    <i class="bi bi-images fs-2"></i>

                                </div>

                                <h5 class="fw-bold text-primary">
                                    Belum Ada Galeri
                                </h5>

                                <p class="text-secondary mb-0">
                                    Dokumentasi kegiatan sekolah
                                    belum tersedia.
                                </p>

                            </div>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>

@endsection
