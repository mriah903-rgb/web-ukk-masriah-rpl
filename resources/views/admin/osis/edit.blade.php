@extends('layouts.admin')

@section('title', 'Edit Pengurus OSIS')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            <i class="bi bi-pencil-square me-2 text-warning"></i>
            Edit Pengurus OSIS
        </h2>

        <p class="text-muted mb-0">
            Perbarui data pengurus OSIS.
        </p>

    </div>


    {{-- Form --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('admin.osis.update', $osi->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @method('PUT')


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
                        value="{{ old('nama', $osi->nama) }}"
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
                        value="{{ old('jabatan', $osi->jabatan) }}"
                        required
                    >

                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto Lama --}}
                @if($osi->foto)

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Foto Saat Ini
                        </label>

                        <div>

                            <img
                                src="{{ asset('storage/' . $osi->foto) }}"
                                alt="{{ $osi->nama }}"
                                width="120"
                                height="120"
                                class="rounded-circle border"
                                style="object-fit: cover;"
                            >

                        </div>

                    </div>

                @endif


                {{-- Foto Baru --}}
                <div class="mb-3">

                    <label for="foto" class="form-label fw-semibold">
                        Ganti Foto
                    </label>

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti foto.
                        Maksimal 2 MB.
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
                    >{{ old('keterangan', $osi->keterangan) }}</textarea>

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
                        class="btn btn-warning"
                    >
                        <i class="bi bi-save me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection