@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Berita</h2>
            <p class="text-muted mb-0">
                Kelola berita yang ditampilkan pada website sekolah.
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Tambah Berita
        </a>
    </div>


    {{-- Notifikasi sukses --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Error validasi --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Tabel berita --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th width="150">
                                Media
                            </th>

                            <th>
                                Judul
                            </th>

                            <th>
                                Slug
                            </th>

                            <th width="160">
                                Tanggal
                            </th>

                            <th width="180" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($beritas as $berita)

                            <tr>

                                {{-- Nomor --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Media --}}
                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        {{-- Gambar --}}
                                        @if($berita->gambar)

                                            <img
                                                src="{{ asset('storage/' . $berita->gambar) }}"
                                                alt="{{ $berita->judul }}"
                                                width="90"
                                                height="60"
                                                class="rounded object-fit-cover"
                                            >

                                        @else

                                            <div
                                                class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 90px; height: 60px;"
                                            >

                                                @if($berita->video)

                                                    <i class="bi bi-camera-video text-muted fs-3"></i>

                                                @else

                                                    <i class="bi bi-image text-muted fs-4"></i>

                                                @endif

                                            </div>

                                        @endif


                                        {{-- Status Video --}}
                                        @if($berita->video)

                                            <span
                                                class="badge bg-dark"
                                                title="Berita memiliki video"
                                            >
                                                <i class="bi bi-camera-video me-1"></i>
                                                Video
                                            </span>

                                        @endif

                                    </div>

                                </td>


                                {{-- Judul --}}
                                <td>

                                    <div class="fw-semibold">
                                        {{ $berita->judul }}
                                    </div>

                                </td>


                                {{-- Slug --}}
                                <td>

                                    <small class="text-muted">
                                        {{ $berita->slug }}
                                    </small>

                                </td>


                                {{-- Tanggal --}}
                                <td>

                                    {{ $berita->created_at->format('d M Y') }}

                                </td>


                                {{-- Aksi --}}
                                <td>

                                    <div class="d-flex justify-content-center gap-2">


                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.berita.edit', $berita->id) }}"
                                            class="btn btn-sm btn-outline-warning"
                                            title="Edit"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- Hapus --}}
                                        <form
                                            action="{{ route('admin.berita.destroy', $berita->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Hapus"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <div class="text-muted">

                                        <i class="bi bi-newspaper fs-1 d-block mb-3"></i>

                                        <h5 class="fw-semibold">
                                            Belum ada berita
                                        </h5>

                                        <p class="mb-3">
                                            Belum ada berita yang ditambahkan.
                                        </p>

                                        <a
                                            href="{{ route('admin.berita.create') }}"
                                            class="btn btn-primary"
                                        >

                                            <i class="bi bi-plus-lg me-1"></i>
                                            Tambah Berita

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection