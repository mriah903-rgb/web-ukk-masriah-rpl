@extends('layouts.app')

@section('title', ($osi->nama ?? 'Detail OSIS') . ' - ' . ($profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati'))

@section('content')

<div class="container py-5">

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">

      

    </nav>


    {{-- Detail Pengurus --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

        <div class="row align-items-center g-0">

            {{-- Foto --}}
            <div class="col-md-5">

                <div class="bg-dark d-flex align-items-center justify-content-center p-4"
                     style="min-height: 360px;">

                    @if($osi->foto)

                        <img
                            src="{{ asset('storage/' . $osi->foto) }}"
                            alt="{{ $osi->nama }}"
                            class="rounded-4 border border-4 border-warning shadow-sm"
                            width="280"
                            height="320"
                            style="object-fit: cover;"
                        >

                    @else

                        <div
                            class="bg-white text-primary rounded-4
                                   d-flex align-items-center
                                   justify-content-center
                                   border border-4 border-warning"
                            style="width: 280px; height: 320px;"
                        >

                            <i class="bi bi-person-fill"
                               style="font-size: 7rem;">
                            </i>

                        </div>

                    @endif

                </div>

            </div>


            {{-- Informasi --}}
            <div class="col-md-7">

                <div class="card-body p-4 p-lg-5">

                    


                    <h1 class="fw-bold text-primary mb-2">
                        {{ $osi->nama }}
                    </h1>


                    <h5 class="text-dark fw-semibold mb-4">
                        {{ $osi->jabatan }}
                    </h5>


                    <hr class="my-4">


                    @if($osi->keterangan)

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary mb-2">
                                Keterangan
                            </h6>

                            <p class="text-secondary mb-0">
                                {{ $osi->keterangan }}
                            </p>

                        </div>

                    @else

                        <div class="mb-4">

                            <h6 class="fw-bold text-primary mb-2">
                                Keterangan
                            </h6>

                            <p class="text-secondary mb-0">
                                Pengurus OSIS
                            </p>

                        </div>

                    @endif


                    {{-- Tombol Kembali --}}
                    <div class="mt-4">

                        <a
                            href="{{ route('osis.index') }}"
                            class="btn btn-outline-primary rounded-pill px-4"
                        >

                            <i class="bi bi-arrow-left me-1"></i>

                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection