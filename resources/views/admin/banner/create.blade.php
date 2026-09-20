@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')

<div class="container-fluid py-4">

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Tambah Banner
        </h2>

        <p class="text-muted mb-0">
            Tambahkan banner untuk halaman beranda.
        </p>
    </div>

    <a
        href="{{ route('admin.banner.index') }}"
        class="btn btn-secondary"
    >
        <i class="bi bi-arrow-left me-1"></i>
        Kembali
    </a>

</div>


{{-- Error --}}
@if ($errors->any())

    <div class="alert alert-danger">

        <strong>
            Terjadi kesalahan:
        </strong>

        <ul class="mb-0 mt-2">

            @foreach ($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


{{-- Form --}}
<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <form
            action="{{ route('admin.banner.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            {{-- Gambar --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Gambar Banner
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.webp"
                    required
                >

                <small class="text-muted">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>

            </div>


            {{-- Judul --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Judul Banner
                </label>

                <input
                    type="text"
                    name="judul"
                    class="form-control"
                    value="{{ old('judul') }}"
                    maxlength="255"
                    placeholder="Masukkan judul banner"
                >

            </div>


            {{-- Deskripsi --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    class="form-control"
                    rows="4"
                    placeholder="Masukkan deskripsi banner"
                >{{ old('deskripsi') }}</textarea>

            </div>


            {{-- Status --}}
            <div class="form-check form-switch mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="is_aktif"
                    value="1"
                    id="is_aktif"
                    {{ old('is_aktif', true) ? 'checked' : '' }}
                >

                <label
                    class="form-check-label"
                    for="is_aktif"
                >
                    Tampilkan banner di beranda
                </label>

            </div>


            {{-- Tombol --}}
            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="bi bi-save me-1"></i>
                    Simpan Banner
                </button>

                <a
                    href="{{ route('admin.banner.index') }}"
                    class="btn btn-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>


</div>

@endsection
