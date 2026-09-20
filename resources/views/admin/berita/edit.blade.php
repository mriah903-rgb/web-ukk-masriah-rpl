@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Edit Berita</h2>
            <p class="text-muted mb-0">
                Perbarui informasi berita yang sudah ada.
            </p>
        </div>

        <a href="{{ route('admin.berita.index') }}"
           class="btn btn-outline-secondary">

            <i class="bi bi-arrow-left me-1"></i>
            Kembali

        </a>
    </div>


    {{-- Error Validasi --}}
    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show"
             role="alert">

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

            <form action="{{ route('admin.berita.update', $berita->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- Judul --}}
                <div class="mb-4">

                    <label for="judul"
                           class="form-label fw-semibold">

                        Judul Berita

                    </label>

                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $berita->judul) }}"
                        placeholder="Masukkan judul berita"
                        required
                    >

                    @error('judul')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Isi Berita --}}
                <div class="mb-4">

                    <label for="isi"
                           class="form-label fw-semibold">

                        Isi Berita

                    </label>

                    <textarea
                        name="isi"
                        id="isi"
                        rows="10"
                        class="form-control @error('isi') is-invalid @enderror"
                        placeholder="Tulis isi berita di sini..."
                        required
                    >{{ old('isi', $berita->isi) }}</textarea>

                    @error('isi')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- ========================================= --}}
                {{-- GAMBAR --}}
                {{-- ========================================= --}}

                {{-- Gambar Lama --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Gambar Saat Ini
                    </label>

                    @if($berita->gambar)

                        <div class="mb-3">

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="{{ $berita->judul }}"
                                class="img-fluid rounded shadow-sm"
                                style="
                                    max-width: 400px;
                                    max-height: 250px;
                                    object-fit: cover;
                                "
                            >

                        </div>

                    @else

                        <div class="alert alert-light border text-muted">
                            <i class="bi bi-image me-1"></i>
                            Berita ini belum memiliki gambar.
                        </div>

                    @endif

                </div>


                {{-- Ganti Gambar --}}
                <div class="mb-4">

                    <label for="gambar"
                           class="form-label fw-semibold">

                        Ganti Gambar

                    </label>

                    <input
                        type="file"
                        name="gambar"
                        id="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti gambar.
                        Format JPG, JPEG, PNG, atau WEBP.
                        Maksimal 2 MB.
                    </div>

                    @error('gambar')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Preview Gambar Baru --}}
                <div class="mb-4 d-none"
                     id="preview-container">

                    <label class="form-label fw-semibold">
                        Preview Gambar Baru
                    </label>

                    <div>

                        <img
                            id="preview-gambar"
                            src="#"
                            alt="Preview gambar baru"
                            class="img-fluid rounded shadow-sm"
                            style="
                                max-width: 400px;
                                max-height: 250px;
                                object-fit: cover;
                            "
                        >

                    </div>

                </div>


                {{-- ========================================= --}}
                {{-- VIDEO --}}
                {{-- ========================================= --}}

                {{-- Video Lama --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Video Saat Ini
                    </label>

                    @if($berita->video)

                        <div class="mb-3">

                            <video
                                controls
                                class="rounded shadow-sm"
                                style="
                                    max-width: 500px;
                                    max-height: 300px;
                                "
                            >
                                <source
                                    src="{{ asset('storage/' . $berita->video) }}"
                                    type="video/mp4"
                                >

                                Browser kamu tidak mendukung pemutar video.
                            </video>

                        </div>

                    @else

                        <div class="alert alert-light border text-muted">
                            <i class="bi bi-camera-video me-1"></i>
                            Berita ini belum memiliki video.
                        </div>

                    @endif

                </div>


                {{-- Ganti Video --}}
                <div class="mb-4">

                    <label for="video"
                           class="form-label fw-semibold">

                        Ganti Video

                    </label>

                    <input
                        type="file"
                        name="video"
                        id="video"
                        class="form-control @error('video') is-invalid @enderror"
                        accept="video/mp4,video/webm,video/quicktime"
                    >

                    <div class="form-text">
                        Kosongkan jika tidak ingin mengganti video.
                        Format MP4, WEBM, atau MOV.
                        Maksimal 20 MB.
                    </div>

                    @error('video')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- Preview Video Baru --}}
                <div class="mb-4 d-none"
                     id="preview-video-container">

                    <label class="form-label fw-semibold">
                        Preview Video Baru
                    </label>

                    <div>

                        <video
                            id="preview-video"
                            controls
                            class="rounded shadow-sm"
                            style="
                                max-width: 500px;
                                max-height: 300px;
                            "
                        >
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
                        Simpan Perubahan

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

    // =========================================
    // PREVIEW GAMBAR BARU
    // =========================================

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


    // =========================================
    // PREVIEW VIDEO BARU
    // =========================================

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