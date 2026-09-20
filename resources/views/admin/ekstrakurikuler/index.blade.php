@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

```
{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Ekstrakurikuler</h2>
        <p class="text-muted mb-0">
            Kelola data ekstrakurikuler sekolah.
        </p>
    </div>

    <a href="{{ route('admin.ekstrakurikuler.create') }}"
       class="btn btn-primary">
        <i class="bi bi-plus-lg"></i>
        Tambah Ekstrakurikuler
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
                        <th width="100">Foto</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Pembina</th>
                        <th>Deskripsi</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($ekstrakurikuler as $item)

                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                @if($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                         alt="{{ $item->nama_ekskul }}"
                                         width="70"
                                         height="50"
                                         class="rounded object-fit-cover">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                         style="width:70px;height:50px;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <strong>
                                    {{ $item->nama_ekskul }}
                                </strong>
                            </td>

                            <td>
                                {{ $item->pembina }}
                            </td>

                            <td>
                                {{ Str::limit($item->deskripsi, 80) }}
                            </td>

                            <td>

                                <a href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>

                                <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">

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
                            <td colspan="6" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-folder2-open fs-1"></i>
                                    <p class="mt-2 mb-0">
                                        Belum ada data ekstrakurikuler.
                                    </p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>
</div>
```

</div>

@endsection
