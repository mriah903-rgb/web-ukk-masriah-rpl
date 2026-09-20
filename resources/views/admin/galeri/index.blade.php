@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">


{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Galeri</h2>
        <p class="text-muted mb-0">
            Kelola foto dan dokumentasi kegiatan sekolah.
        </p>
    </div>

    <a href="{{ route('admin.galeri.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        Tambah Galeri
    </a>
</div>

{{-- Alert --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

{{-- Tabel --}}
<div class="card border-0 shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th width="130">Foto</th>
                        <th>Judul</th>
                        <th>Keterangan</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($galeri as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                @if($item->foto)

                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         alt="{{ $item->judul }}"
                                         width="100"
                                         height="70"
                                         class="rounded"
                                         style="object-fit: cover;">

                                @else

                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width:100px; height:70px;">
                                        <i class="bi bi-image text-muted fs-4"></i>
                                    </div>

                                @endif
                            </td>

                            <td>
                                <strong>
                                    {{ $item->judul }}
                                </strong>
                            </td>

                            <td>
                                {{ Str::limit($item->keterangan, 100) }}
                            </td>

                            <td>

                                <a href="{{ route('admin.galeri.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.galeri.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus foto ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center py-5">

                                <i class="bi bi-images fs-1 text-muted"></i>

                                <p class="text-muted mt-2 mb-0">
                                    Belum ada data galeri.
                                </p>

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
