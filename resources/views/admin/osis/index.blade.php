@extends('layouts.admin')

@section('title', 'Data OSIS')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-people-fill me-2 text-primary"></i>
                Data OSIS
            </h2>

            <p class="text-muted mb-0">
                Kelola data pengurus OSIS sekolah.
            </p>
        </div>

        <a href="{{ route('admin.osis.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle me-1"></i>
            Tambah Pengurus

        </a>

    </div>


    {{-- Pesan berhasil --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Card Data --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            @if($osis->count() > 0)

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-dark">

                            <tr>
                                <th width="60">No</th>
                                <th width="100">Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Keterangan</th>
                                <th width="180">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($osis as $item)

                                <tr>

                                    {{-- Nomor --}}
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    {{-- Foto --}}
                                    <td>

                                        @if($item->foto)

                                            <img
                                                src="{{ asset('storage/' . $item->foto) }}"
                                                alt="{{ $item->nama }}"
                                                class="rounded-circle border"
                                                width="60"
                                                height="60"
                                                style="object-fit: cover;"
                                            >

                                        @else

                                            <div
                                                class="bg-light border rounded-circle d-flex align-items-center justify-content-center"
                                                style="width: 60px; height: 60px;"
                                            >
                                                <i class="bi bi-person-fill text-secondary fs-4"></i>
                                            </div>

                                        @endif

                                    </td>


                                    {{-- Nama --}}
                                    <td>

                                        <span class="fw-semibold">
                                            {{ $item->nama }}
                                        </span>

                                    </td>


                                    {{-- Jabatan --}}
                                    <td>

                                        <span class="badge bg-primary">
                                            {{ $item->jabatan }}
                                        </span>

                                    </td>


                                    {{-- Keterangan --}}
                                    <td>

                                        @if($item->keterangan)

                                            {{ $item->keterangan }}

                                        @else

                                            <span class="text-muted">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- Aksi --}}
                                    <td>

                                        <div class="d-flex gap-2">

                                            {{-- Edit --}}
                                            <a
                                                href="{{ route('admin.osis.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"
                                                title="Edit"
                                            >
                                                <i class="bi bi-pencil-square"></i>
                                            </a>


                                            {{-- Hapus --}}
                                            <form
                                                action="{{ route('admin.osis.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus data {{ $item->nama }}?')"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Hapus"
                                                >
                                                    <i class="bi bi-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                {{-- Jika belum ada data --}}
                <div class="text-center py-5">

                    <i class="bi bi-people text-secondary"
                       style="font-size: 4rem;">
                    </i>

                    <h5 class="fw-bold mt-3">
                        Belum Ada Data Pengurus OSIS
                    </h5>

                    <p class="text-muted">
                        Silakan tambahkan pengurus OSIS terlebih dahulu.
                    </p>

                    <a
                        href="{{ route('admin.osis.create') }}"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-plus-circle me-1"></i>
                        Tambah Pengurus
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection