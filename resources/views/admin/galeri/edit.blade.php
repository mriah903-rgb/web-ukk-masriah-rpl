@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

<div class="mb-4">
    <h2 class="fw-bold mb-1">Edit Galeri</h2>
    <p class="text-muted mb-0">
        Perbarui informasi dan foto galeri.
    </p>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('admin.galeri.update', $galeri->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Judul
                </label>

                <input type="text"
                       name="judul"
                       value="{{ old('judul', $galeri->judul) }}"
                       class="form-control @error('judul') is-invalid @enderror">

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Foto Saat Ini --}}
            @if($galeri->foto)

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Foto Saat Ini
                    </label>

                    <div>
                        <img src="{{ asset('storage/' . $galeri->foto) }}"
                             alt="{{ $galeri->judul }}"
                             width="220"
                             class="rounded shadow-sm">
                    </div>

                </div>

            @endif

            {{-- Foto Baru --}}
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Ganti Foto
                </label>

                <input type="file"
                       name="foto"
                       accept="image/*"
                       class="form-control @error('foto') is-invalid @enderror">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti foto.
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
                          class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $galeri->keterangan) }}</textarea>

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
                    Update
                </button>

            </div>

        </form>

    </div>

</div>


</div>

@endsection
