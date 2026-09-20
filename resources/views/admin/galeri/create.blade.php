@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">
<div class="mb-4">
    <h2 class="fw-bold mb-1">Tambah Galeri</h2>
    <p class="text-muted mb-0">
        Tambahkan foto dokumentasi kegiatan sekolah.
    </p>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('admin.galeri.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- Judul --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Judul
                </label>

                <input type="text"
                       name="judul"
                       value="{{ old('judul') }}"
                       class="form-control @error('judul') is-invalid @enderror"
                       placeholder="Contoh: Kegiatan Upacara Bendera">

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Foto --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Foto
                </label>

                <input type="file"
                       name="foto"
                       accept="image/*"
                       class="form-control @error('foto') is-invalid @enderror">

                <small class="text-muted">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>

                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Keterangan --}}
            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Keterangan
                </label>

                <textarea name="keterangan"
                          rows="5"
                          class="form-control @error('keterangan') is-invalid @enderror"
                          placeholder="Masukkan keterangan foto">{{ old('keterangan') }}</textarea>

                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Tombol --}}
            <div class="d-flex gap-2">

                <a href="{{ route('admin.galeri.index') }}"
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
