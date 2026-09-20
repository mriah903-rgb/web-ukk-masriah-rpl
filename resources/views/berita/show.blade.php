@extends('layouts.app')

@section('title', $berita->judul)

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">


            {{-- Gambar Berita --}}
            @if ($berita->gambar)

                <div class="bg-white text-center p-3">

                    <img
                        src="{{ asset('storage/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="img-fluid rounded-3"
                        style="max-height: 500px; object-fit: contain;">

                </div>

            @endif


            {{-- Video Berita --}}
            @if ($berita->video)

                <div class="bg-dark text-center p-3">

                    <video
                        controls
                        class="w-100 rounded-3"
                        style="max-height: 500px;"
                    >

                        <source
                            src="{{ asset('storage/' . $berita->video) }}"
                        >

                        Browser Anda tidak mendukung pemutaran video.

                    </video>

                </div>

            @endif


            {{-- Isi Detail Berita --}}
            <div class="card-body p-4 p-md-5">


                {{-- Tanggal --}}
                <small class="text-secondary d-block mb-3">

                    <i class="bi bi-calendar3 text-warning me-1"></i>

                    {{ $berita->created_at->format('d M Y') }}

                </small>


                {{-- Judul --}}
                <h1 class="fw-bold text-primary mb-4">

                    {{ $berita->judul }}

                </h1>


                <hr>


                {{-- Isi Berita --}}
                <div class="text-secondary lh-lg">

                    {!! $berita->isi !!}

                </div>


                {{-- Tombol Kembali --}}
                <a
                    href="{{ route('berita.index') }}"
                    class="btn btn-dark mt-4">

                    <i class="bi bi-arrow-left me-1"></i>
                    Kembali ke Berita

                </a>

            </div>

        </div>

    </div>

</section>

@endsection