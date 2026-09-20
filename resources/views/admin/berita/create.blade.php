@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Tambah Berita</h2>
            <p class="text-muted mb-0">
                Tambahkan berita baru ke website sekolah.
            </p>
        </div>

        <a href="{{ route('admin.berita.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </div>

    {{-- Error Validasi --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <strong>Terjadi kesalahan!</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>
    @endif


    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form action="{{ route('admin.berita.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- Judul --}}
                <div class="mb-4">

                    <label for="judul" class="form-label fw-semibold">
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul') }}"
                        placeholder="Masukkan judul berita"
                        required
                    >

                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Isi --}}
                <div class="mb-4">

                    <label for="isi" class="form-label fw-semibold">
                        Isi Berita
                    </label>

                    <textarea
                        name="isi"
                        id="isi"
                        rows="10"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Tulis isi berita di sini..."
                        required
                    >{{ old('isi') }}</textarea>

                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Gambar --}}
                <div class="mb-4">

                    <label for="gambar" class="form-label fw-semibold">
                        Gambar Berita
                    </label>

                    <input
                        type="file"
                        name="gambar"
                        id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Format yang diperbolehkan: JPG, JPEG, PNG, WEBP.
                        Maksimal ukuran 2 MB.
                    </div>

                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Preview Gambar --}}
                <div class="mb-4 d-none" id="preview-container">

                    <label class="form-label fw-semibold">
                        Preview Gambar
                    </label>

                    <div>
                        <img
                            id="preview-gambar"
                            src="#"
                            alt="Preview gambar"
                            class="img-fluid rounded shadow-sm"
                            style="max-width: 400px; max-height: 250px; object-fit: cover;"
                        >
                    </div>

                </div>


                {{-- Video --}}
                <div class="mb-4">

                    <label for="video" class="form-label fw-semibold">
                        Video Berita
                    </label>

                    <input
                        type="file"
                        name="video"
                        id="video"
                        class="form-control @error('video') is-invalid @enderror"
                        accept="video/mp4,video/webm,video/quicktime"
                    >

                    <div class="form-text">
                        Format yang diperbolehkan: MP4, WEBM, MOV.
                        Maksimal ukuran 20 MB.
                    </div>

                    @error('video')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Preview Video --}}
                <div class="mb-4 d-none" id="preview-video-container">

                    <label class="form-label fw-semibold">
                        Preview Video
                    </label>

                    <div>
                        <video
                            id="preview-video"
                            controls
                            class="rounded shadow-sm"
                            style="max-width: 500px; max-height: 300px;">
                        </video>
                    </div>

                </div>


                {{-- Tombol --}}
                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('admin.berita.index') }}"
                       class="btn btn-secondary">

                        Batal

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="bi bi-save me-1"></i>
                        Simpan Berita

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

    // ==========================
    // Preview Gambar
    // ==========================

    const gambarInput = document.getElementById('gambar');
    const previewContainer = document.getElementById('preview-container');
    const previewGambar = document.getElementById('preview-gambar');

    gambarInput.addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (file) {

            previewGambar.src = URL.createObjectURL(file);

            previewContainer.classList.remove('d-none');

        } else {

            previewGambar.src = '#';

            previewContainer.classList.add('d-none');

        }

    });


    // ==========================
    // Preview Video
    // ==========================

    const videoInput = document.getElementById('video');
    const previewVideoContainer = document.getElementById('preview-video-container');
    const previewVideo = document.getElementById('preview-video');

    videoInput.addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (file) {

            previewVideo.src = URL.createObjectURL(file);

            previewVideoContainer.classList.remove('d-none');

        } else {

            previewVideo.src = '';

            previewVideoContainer.classList.add('d-none');

        }

    });

</script>

@endpush