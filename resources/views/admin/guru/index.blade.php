@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Data Guru</h2>
            <p class="text-muted mb-0">
                Kelola data guru dan tenaga pendidik sekolah.
            </p>
        </div>

        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Guru
        </a>
    </div>


    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                            <th width="90">Foto</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>NUPTK</th>
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Mata Pelajaran</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($guru as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    @if($item->foto)
                                        <img
                                            src="{{ asset('storage/' . $item->foto) }}"
                                            alt="{{ $item->nama }}"
                                            width="60"
                                            height="60"
                                            class="rounded object-fit-cover"
                                        >
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                             style="width:60px;height:60px;">
                                            <i class="bi bi-person text-muted fs-4"></i>
                                        </div>
                                    @endif
                                </td>

                                <td class="fw-semibold">
                                    {{ $item->nama }}
                                </td>

                                <td>
                                    {{ $item->nip ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->nuptk ?? '-' }}
                                </td>

                                <td>
                                    @if($item->jenis_kelamin === 'L')
                                        Laki-laki
                                    @else
                                        Perempuan
                                    @endif
                                </td>

                                <td>
                                    {{ $item->jabatan ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->mata_pelajaran ?? '-' }}
                                </td>

                                <td>

                                    <div class="d-flex gap-1">

                                        <a href="{{ route('admin.guru.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('admin.guru.destroy', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="text-center py-4 text-muted">
                                    Belum ada data guru.
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

