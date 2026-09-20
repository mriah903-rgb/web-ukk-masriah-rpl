@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Tambah Jurusan</h2>
        <p class="text-muted mb-0">
            Tambahkan data jurusan baru ke sistem.
        </p>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.jurusan.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- Kode Jurusan --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Kode Jurusan
                    </label>

                    <input type="text"
                           name="kode_jurusan"
                           value="{{ old('kode_jurusan') }}"
                           class="form-control @error('kode_jurusan') is-invalid @enderror"
                           placeholder="Contoh: RPL">

                    @error('kode_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Nama Jurusan --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Jurusan
                    </label>

                    <input type="text"
                           name="nama_jurusan"
                           value="{{ old('nama_jurusan') }}"
                           class="form-control @error('nama_jurusan') is-invalid @enderror"
                           placeholder="Contoh: Rekayasa Perangkat Lunak">

                    @error('nama_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Singkatan --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Singkatan
                    </label>

                    <input type="text"
                           name="singkatan"
                           value="{{ old('singkatan') }}"
                           class="form-control @error('singkatan') is-invalid @enderror"
                           placeholder="Contoh: RPL">

                    @error('singkatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                {{-- Logo --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Logo Jurusan
                    </label>

                    <input type="file"
                           name="logo"
                           accept="image/*"
                           class="form-control @error('logo') is-invalid @enderror">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                    </small>

                    @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('admin.jurusan.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

