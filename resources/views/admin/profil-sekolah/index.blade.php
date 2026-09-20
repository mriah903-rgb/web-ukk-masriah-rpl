@extends('layouts.admin')

@section('title', 'Profil Sekolah')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold mb-1">
                Profil Sekolah
            </h1>

            <p class="text-muted mb-0">
                Kelola informasi profil sekolah
            </p>
        </div>

        @if($profil)
            <a href="{{ route('admin.profilsekolah.edit') }}"
               class="btn btn-warning">
                <i class="bi bi-pencil-square"></i>
                Edit Profil
            </a>
        @else
            <a href="{{ route('admin.profilsekolah.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Tambah Profil
            </a>
        @endif

    </div>


    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif


    {{-- Pesan informasi --}}
    @if(session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">

            {{ session('info') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif


    {{-- Jika profil tersedia --}}
    @if($profil)

        <div class="card shadow-sm border-0">

            <div class="card-body p-4">

                {{-- Logo dan nama sekolah --}}
                <div class="d-flex align-items-center mb-4">

                    @if($profil->logo)

                        <img src="{{ asset('storage/' . $profil->logo) }}"
                             alt="Logo {{ $profil->nama_sekolah }}"
                             width="100"
                             height="100"
                             class="rounded me-4"
                             style="object-fit: contain;">

                    @endif

                    <div>
                        <h2 class="fw-bold mb-1">
                            {{ $profil->nama_sekolah }}
                        </h2>

                        <p class="text-muted mb-0">
                            {{ $profil->bentuk_pendidikan ?? '-' }}
                        </p>
                    </div>

                </div>


                <hr>


                {{-- Identitas sekolah --}}
                <h4 class="fw-bold mb-3">
                    Identitas Sekolah
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">
                            NPSN
                        </label>

                        <div>
                            {{ $profil->npsn ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">
                            Status Sekolah
                        </label>

                        <div>
                            {{ $profil->status_sekolah ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">
                            Bentuk Pendidikan
                        </label>

                        <div>
                            {{ $profil->bentuk_pendidikan ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">
                            Kepala Sekolah
                        </label>

                        <div>
                            {{ $profil->kepala_sekolah ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-6 mb-3">

                        <label class="fw-bold">
                            Akreditasi
                        </label>

                        <div>
                            {{ $profil->akreditasi ?? '-' }}
                        </div>

                    </div>

                </div>


                <hr>


                {{-- Alamat --}}
                <h4 class="fw-bold mb-3">
                    Alamat
                </h4>

                <p class="mb-4">

                    {{ $profil->alamat_jalan ?? '-' }}

                    <br>

                    {{ $profil->desa_kelurahan ?? '-' }},
                    {{ $profil->kecamatan ?? '-' }}

                    <br>

                    {{ $profil->kabupaten_kota ?? '-' }},
                    {{ $profil->provinsi ?? '-' }}

                    @if($profil->kode_pos)
                        - {{ $profil->kode_pos }}
                    @endif

                </p>


                {{-- Kontak --}}
                <h4 class="fw-bold mb-3">
                    Kontak
                </h4>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="fw-bold">
                            Telepon
                        </label>

                        <div>
                            {{ $profil->telepon ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="fw-bold">
                            Email
                        </label>

                        <div>
                            {{ $profil->email ?? '-' }}
                        </div>

                    </div>


                    <div class="col-md-4 mb-3">

                        <label class="fw-bold">
                            Website
                        </label>

                        <div>
                            {{ $profil->website ?? '-' }}
                        </div>

                    </div>

                </div>


                <hr>


                {{-- Visi --}}
                <h4 class="fw-bold mb-3">
                    Visi
                </h4>

                <p>
                    {{ $profil->visi ?? '-' }}
                </p>


                <hr>


                {{-- Misi --}}
                <h4 class="fw-bold mb-3">
                    Misi
                </h4>

                <p>
                    {!! nl2br(e($profil->misi ?? '-')) !!}
                </p>


                <hr>


                {{-- Sejarah --}}
                <h4 class="fw-bold mb-3">
                    Sejarah Sekolah
                </h4>

                <p>
                    {!! nl2br(e($profil->sejarah ?? '-')) !!}
                </p>

            </div>

        </div>

    @else

        {{-- Jika belum ada data --}}
        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <h4 class="fw-bold mb-2">
                    Profil Sekolah Belum Tersedia
                </h4>

                <p class="text-muted mb-4">
                    Silakan tambahkan data profil sekolah terlebih dahulu.
                </p>

                <a href="{{ route('admin.profilsekolah.create') }}"
                   class="btn btn-primary">

                    <i class="bi bi-plus-lg"></i>
                    Tambah Profil Sekolah

                </a>

            </div>

        </div>

    @endif

</div>

@endsection