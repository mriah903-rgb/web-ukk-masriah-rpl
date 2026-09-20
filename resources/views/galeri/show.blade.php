@extends('layouts.app')

@section('title', $galeri->judul)

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

            {{-- Foto Galeri --}}
            @if ($galeri->foto)

                <div class="bg-dark text-center">

                    <img
                        src="{{ asset('storage/' . $galeri->foto) }}"
                        alt="{{ $galeri->judul }}"
                        class="img-fluid"
                        style="max-height: 600px; object-fit: contain;">

                </div>

            @else

                <div
                    class="bg-dark text-warning d-flex align-items-center justify-content-center"
                    style="height: 400px;">

                    <i class="bi bi-images fs-1"></i>

                </div>

            @endif

            {{-- Isi Detail --}}
            <div class="card-body p-4 p-md-5">

                {{-- Judul --}}
                <h1 class="fw-bold text-primary mb-3">

                    {{ $galeri->judul }}

                </h1>

                <hr>

                {{-- Keterangan --}}
                @if ($galeri->keterangan)

                    <div class="text-secondary lh-lg">

                        {{ $galeri->keterangan }}

                    </div>

                @else

                    <p class="text-secondary mb-0">

                        Tidak ada keterangan untuk galeri ini.

                    </p>

                @endif

                {{-- Tombol Kembali --}}
                <a
                    href="{{ route('galeri.index') }}"
                    class="btn btn-dark mt-4">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali ke Galeri

                </a>

            </div>

        </div>

    </div>

</section>

@endsection

