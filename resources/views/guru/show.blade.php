@extends('layouts.app')

@section('title', $guru->nama . ' - Guru dan Tenaga Pendidik')

@section('content')



<section class="bg-dark text-white p-0 m-0">
    <div class="container py-5">

    <div class="row align-items-center">

        <div class="col-lg-8">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                <i class="bi bi-person-badge-fill me-1"></i>
                PROFIL GURU
            </span>

            <h1 class="display-5 fw-bold mb-3">
                {{ $guru->nama }}
            </h1>

            <p class="lead text-white-50 mb-0">
                Profil guru dan tenaga pendidik SMK Negeri 1 Cijati.
            </p>

        </div>

    </div>

</div>


</section>



<section class="py-5 bg-light">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-4 mb-4 mb-lg-0">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <div class="card-body text-center p-4">

                    @if($guru->foto)

                        <img
                            src="{{ asset('storage/' . $guru->foto) }}"
                            alt="{{ $guru->nama }}"
                            class="rounded-circle border border-4 border-warning mb-4"
                            width="220"
                            height="220"
                            style="object-fit: cover;"
                        >

                    @else

                        <div
                            class="rounded-circle bg-dark text-warning d-flex align-items-center justify-content-center mx-auto mb-4"
                            style="width: 220px; height: 220px;"
                        >
                            <i class="bi bi-person-fill" style="font-size: 6rem;"></i>
                        </div>

                    @endif

                    <h3 class="fw-bold text-primary mb-2">
                        {{ $guru->nama }}
                    </h3>

                    @if($guru->jabatan)

                        <span class="badge bg-dark text-warning px-3 py-2 rounded-pill">
                            {{ $guru->jabatan }}
                        </span>

                    @endif

                </div>

            </div>

        </div>

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 p-lg-5">

                    <div class="mb-4">

                        <span class="badge bg-warning text-dark px-3 py-2 mb-2">
                            INFORMASI GURU
                        </span>

                        <h3 class="fw-bold text-primary">
                            Data Guru dan Tenaga Pendidik
                        </h3>

                    </div>

                    <div class="row border-bottom py-3">

                        <div class="col-sm-4 fw-semibold text-secondary">
                            <i class="bi bi-person-fill text-warning me-2"></i>
                            Nama
                        </div>

                        <div class="col-sm-8 fw-semibold">
                            {{ $guru->nama }}
                        </div>

                    </div>

                    @if($guru->nip)

                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">
                                <i class="bi bi-person-vcard-fill text-warning me-2"></i>
                                NIP
                            </div>

                            <div class="col-sm-8">
                                {{ $guru->nip }}
                            </div>

                        </div>

                    @endif

                    @if($guru->nuptk)

                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">
                                <i class="bi bi-card-text text-warning me-2"></i>
                                NUPTK
                            </div>

                            <div class="col-sm-8">
                                {{ $guru->nuptk }}
                            </div>

                        </div>

                    @endif

                    @if($guru->jenis_kelamin)

                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">
                                <i class="bi bi-gender-ambiguous text-warning me-2"></i>
                                Jenis Kelamin
                            </div>

                            <div class="col-sm-8">
                                {{ $guru->jenis_kelamin }}
                            </div>

                        </div>

                    @endif

                    @if($guru->jabatan)

                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">
                                <i class="bi bi-briefcase-fill text-warning me-2"></i>
                                Jabatan
                            </div>

                            <div class="col-sm-8">
                                {{ $guru->jabatan }}
                            </div>

                        </div>

                    @endif


                    @if($guru->mata_pelajaran)

                        <div class="row border-bottom py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">
                                <i class="bi bi-book-fill text-warning me-2"></i>
                                Mata Pelajaran
                            </div>

                            <div class="col-sm-8">
                                {{ $guru->mata_pelajaran }}
                            </div>

                        </div>

                    @endif


                    @if($guru->pendidikan_terakhir)

                        <div class="row py-3">

                            <div class="col-sm-4 fw-semibold text-secondary">
                                <i class="bi bi-mortarboard-fill text-warning me-2"></i>
                                Pendidikan
                            </div>

                            <div class="col-sm-8">
                                {{ $guru->pendidikan_terakhir }}
                            </div>

                        </div>

                    @endif
                    <div class="mt-4">

                        <a href="{{ route('guru.index') }}"
                           class="btn btn-dark px-4">

                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali ke Data Guru

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</section>

@endsection
