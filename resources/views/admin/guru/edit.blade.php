@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Edit Guru</h2>
        <p class="text-muted mb-0">
            Perbarui data guru atau tenaga pendidik.
        </p>
    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.guru.update', $guru->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- Nama --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $guru->nama) }}"
                           class="form-control @error('nama') is-invalid @enderror"
                           required>

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- NIP --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        NIP
                    </label>

                    <input type="text"
                           name="nip"
                           value="{{ old('nip', $guru->nip) }}"
                           class="form-control @error('nip') is-invalid @enderror">

                    @error('nip')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- NUPTK --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        NUPTK
                    </label>

                    <input type="text"
                           name="nuptk"
                           value="{{ old('nuptk', $guru->nuptk) }}"
                           class="form-control @error('nuptk') is-invalid @enderror">

                    @error('nuptk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Jenis Kelamin --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Jenis Kelamin
                    </label>

                    <select name="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror"
                            required>

                        <option value="L"
                            {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="P"
                            {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Jabatan --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Jabatan
                    </label>

                    <input type="text"
                           name="jabatan"
                           value="{{ old('jabatan', $guru->jabatan) }}"
                           class="form-control @error('jabatan') is-invalid @enderror">

                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Mata Pelajaran --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Mata Pelajaran
                    </label>

                    <input type="text"
                           name="mata_pelajaran"
                           value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                           class="form-control @error('mata_pelajaran') is-invalid @enderror">

                    @error('mata_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Pendidikan --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Pendidikan Terakhir
                    </label>

                    <input type="text"
                           name="pendidikan_terakhir"
                           value="{{ old('pendidikan_terakhir', $guru->pendidikan_terakhir) }}"
                           class="form-control @error('pendidikan_terakhir') is-invalid @enderror">

                    @error('pendidikan_terakhir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto Lama --}}
                @if($guru->foto)

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Foto Saat Ini
                        </label>

                        <div>
                            <img
                                src="{{ asset('storage/' . $guru->foto) }}"
                                alt="{{ $guru->nama }}"
                                width="120"
                                class="rounded shadow-sm"
                            >
                        </div>

                    </div>

                @endif


                {{-- Foto Baru --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Ganti Foto
                    </label>

                    <input type="file"
                           name="foto"
                           accept="image/*"
                           class="form-control @error('foto') is-invalid @enderror">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto.
                        Maksimal 2 MB.
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Tombol --}}
                <div class="d-flex gap-2">

                    <a href="{{ route('admin.guru.index') }}"
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

