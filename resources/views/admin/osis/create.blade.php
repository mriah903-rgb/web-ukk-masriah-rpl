@extends('layouts.admin')

@section('title', 'Tambah Pengurus OSIS')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            <i class="bi bi-person-plus-fill me-2 text-primary"></i>
            Tambah Pengurus OSIS
        </h2>

        <p class="text-muted mb-0">
            Tambahkan data pengurus OSIS baru.
        </p>

    </div>


    {{-- Form --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.osis.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- Nama --}}
                <div class="mb-3">

                    <label for="nama" class="form-label fw-semibold">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                    >

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Jabatan --}}
                <div class="mb-3">

                    <label for="jabatan" class="form-label fw-semibold">
                        Jabatan
                    </label>

                    <input
                        type="text"
                        name="jabatan"
                        id="jabatan"
                        class="form-control @error('jabatan') is-invalid @enderror"
                        value="{{ old('jabatan') }}"
                        placeholder="Contoh: Ketua OSIS"
                        required
                    >

                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto --}}
                <div class="mb-3">

                    <label for="foto" class="form-label fw-semibold">
                        Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </div>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Keterangan --}}
                <div class="mb-4">

                    <label for="keterangan" class="form-label fw-semibold">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="4"
                        class="form-control @error('keterangan') is-invalid @enderror"
                        placeholder="Masukkan keterangan jika diperlukan"
                    >{{ old('keterangan') }}</textarea>

                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Tombol --}}
                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.osis.index') }}"
                        class="btn btn-secondary"
                    >
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection