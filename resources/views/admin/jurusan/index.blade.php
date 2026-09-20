@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">Data Jurusan</h2>
            <p class="text-muted mb-0">
                Kelola data jurusan sekolah.
            </p>
        </div>

        <a href="{{ route('admin.jurusan.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Jurusan
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th width="100">Logo</th>
                            <th>Kode</th>
                            <th>Nama Jurusan</th>
                            <th>Singkatan</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($jurusan as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if($item->logo)
                                        <img src="{{ asset('storage/' . $item->logo) }}"
                                             alt="{{ $item->nama_jurusan }}"
                                             width="60"
                                             height="60"
                                             class="rounded"
                                             style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">
                                            Tidak ada
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $item->kode_jurusan }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $item->nama_jurusan }}
                                </td>

                                <td>
                                    {{ $item->singkatan ?? '-' }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.jurusan.edit', $item->id) }}"
                                       class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.jurusan.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">

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
                                <td colspan="6"
                                    class="text-center text-muted py-4">
                                    Belum ada data jurusan.
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

