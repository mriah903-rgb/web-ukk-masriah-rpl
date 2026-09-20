@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')

<div class="container-fluid py-4">

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Edit Banner
        </h2>

        <p class="text-muted mb-0">
            Perbarui banner untuk halaman beranda.
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
            action="{{ route('admin.banner.update', $banner) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            {{-- Gambar Lama --}}
            @if($banner->gambar)

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Gambar Saat Ini
                    </label>

                    <div>

                        @if(file_exists(public_path('uploads/banner/' . $banner->gambar)))

                            <img
                                src="{{ asset('uploads/banner/' . $banner->gambar) }}"
                                alt="{{ $banner->judul ?: 'Banner' }}"
                                class="img-fluid rounded shadow-sm"
                                style="
                                    max-width: 700px;
                                    width: 100%;
                                    height: 300px;
                                    object-fit: cover;
                                "
                            >

                        @else

                            <div class="alert alert-warning">
                                File gambar tidak ditemukan.
                            </div>

                        @endif

                    </div>

                </div>

            @endif


            {{-- Ganti Gambar --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control"
                    accept=".jpg,.jpeg,.png,.webp"
                >

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar.
                    Maksimal 2 MB.
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
                    value="{{ old('judul', $banner->judul) }}"
                    maxlength="255"
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
                >{{ old('deskripsi', $banner->deskripsi) }}</textarea>

            </div>


            {{-- Status --}}
            <div class="form-check form-switch mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="is_aktif"
                    value="1"
                    id="is_aktif"
                    {{ old('is_aktif', $banner->is_aktif) ? 'checked' : '' }}
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
                    Simpan Perubahan
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
