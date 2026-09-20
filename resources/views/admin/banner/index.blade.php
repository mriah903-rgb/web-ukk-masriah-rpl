@extends('layouts.admin')

@section('title', 'Kelola Banner')

@section('content')

<div class="container-fluid py-4">

{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Kelola Banner
        </h2>

        <p class="text-muted mb-0">
            Kelola banner yang ditampilkan pada halaman beranda website.
        </p>
    </div>

    <a href="{{ route('admin.banner.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i>
        Tambah Banner
    </a>

</div>


{{-- Notifikasi sukses --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        <i class="bi bi-check-circle me-2"></i>

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- Notifikasi error --}}
@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show"
         role="alert">

        <i class="bi bi-exclamation-circle me-2"></i>

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- Validasi error --}}
@if($errors->any())

    <div class="alert alert-danger">

        <strong>
            Terjadi kesalahan:
        </strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>
                    {{ $error }}
                </li>

            @endforeach

        </ul>

    </div>

@endif


{{-- Tabel Banner --}}
<div class="card border-0 shadow-sm">

    <div class="card-header bg-white border-0 py-3">

        <div class="d-flex justify-content-between align-items-center">

            <h5 class="fw-bold mb-0">
                Daftar Banner
            </h5>

            <span class="badge bg-primary">
                {{ $banners->count() }} Banner
            </span>

        </div>

    </div>


    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="60">
                            No
                        </th>

                        <th width="220">
                            Gambar
                        </th>

                        <th>
                            Judul
                        </th>

                        <th>
                            Deskripsi
                        </th>

                        <th width="130">
                            Status
                        </th>

                        <th width="180">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($banners as $banner)

                        <tr>

                            {{-- Nomor --}}
                            <td>
                                {{ $loop->iteration }}
                            </td>


                            {{-- Gambar --}}
                            <td>

                                @if($banner->gambar)

                                    <img
                                        src="{{ asset('uploads/banner/' . $banner->gambar) }}"
                                        alt="{{ $banner->judul ?? 'Banner' }}"
                                        width="180"
                                        height="90"
                                        class="rounded shadow-sm"
                                        style="object-fit: cover;"
                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                                    >

                                    <span
                                        class="text-danger small"
                                        style="display: none;"
                                    >
                                        <i class="bi bi-image-alt"></i>
                                        Gambar tidak ditemukan
                                    </span>

                                @else

                                    <div class="text-muted small">

                                        <i class="bi bi-image me-1"></i>

                                        Tidak ada gambar

                                    </div>

                                @endif

                            </td>


                            {{-- Judul --}}
                            <td>

                                <strong>
                                    {{ $banner->judul ?? '-' }}
                                </strong>

                            </td>


                            {{-- Deskripsi --}}
                            <td>

                                @if($banner->deskripsi)

                                    {{ Str::limit($banner->deskripsi, 80) }}

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($banner->is_aktif)

                                    <span class="badge bg-success">

                                        <i class="bi bi-check-circle me-1"></i>

                                        Aktif

                                    </span>

                                @else

                                    <span class="badge bg-secondary">

                                        <i class="bi bi-x-circle me-1"></i>

                                        Tidak Aktif

                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td>

                                <div class="d-flex gap-1">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('admin.banner.edit', $banner) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit Banner"
                                    >

                                        <i class="bi bi-pencil-square"></i>

                                        Edit

                                    </a>


                                    {{-- Hapus --}}
                                    <form
                                        action="{{ route('admin.banner.destroy', $banner) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus banner ini?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus Banner"
                                        >

                                            <i class="bi bi-trash"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="text-center py-5"
                            >

                                <div class="text-muted">

                                    <i
                                        class="bi bi-images"
                                        style="font-size: 50px;"
                                    ></i>

                                    <h5 class="mt-3">
                                        Belum ada banner
                                    </h5>

                                    <p>
                                        Silakan tambahkan banner terlebih dahulu.
                                    </p>

                                    <a
                                        href="{{ route('admin.banner.create') }}"
                                        class="btn btn-primary"
                                    >

                                        <i class="bi bi-plus-lg me-1"></i>

                                        Tambah Banner

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
