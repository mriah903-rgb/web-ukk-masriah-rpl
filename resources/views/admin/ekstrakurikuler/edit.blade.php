@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">


<div class="mb-4">
    <h2 class="fw-bold mb-1">Edit Ekstrakurikuler</h2>
    <p class="text-muted mb-0">
        Perbarui data ekstrakurikuler.
    </p>
</div>

<div class="card border-0 shadow-sm">

    <div class="card-body">

        <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Nama Ekstrakurikuler
                </label>

                <input type="text"
                       name="nama_ekskul"
                       class="form-control @error('nama_ekskul') is-invalid @enderror"
                       value="{{ old('nama_ekskul', $ekstrakurikuler->nama_ekskul) }}">

                @error('nama_ekskul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Pembina --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Pembina
                </label>

                <input type="text"
                       name="pembina"
                       class="form-control @error('pembina') is-invalid @enderror"
                       value="{{ old('pembina', $ekstrakurikuler->pembina) }}">

                @error('pembina')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          rows="5"
                          class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Foto Lama --}}
            @if($ekstrakurikuler->foto)

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Foto Saat Ini
                    </label>

                    <br>

                    <img src="{{ asset('storage/' . $ekstrakurikuler->foto) }}"
                         alt="{{ $ekstrakurikuler->nama_ekskul }}"
                         width="180"
                         class="rounded shadow-sm">
                </div>

            @endif

            {{-- Foto Baru --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">
                    Ganti Foto
                </label>

                <input type="file"
                       name="foto"
                       class="form-control @error('foto') is-invalid @enderror"
                       accept="image/*">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti foto.
                </small>

                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="d-flex gap-2">

                <a href="{{ route('admin.ekstrakurikuler.index') }}"
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
