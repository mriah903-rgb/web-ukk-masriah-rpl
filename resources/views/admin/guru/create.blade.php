@extends('layouts.admin')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h2 class="fw-bold mb-1">Tambah Guru</h2>
        <p class="text-muted mb-0">
            Tambahkan data guru atau tenaga pendidik baru.
        </p>
    </div>


    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <form action="{{ route('admin.guru.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- Nama --}}
                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Nama Lengkap
                    </label>

                    <input type="text"
                           name="nama"
                           value="{{ old('nama') }}"
                           class="form-control @error('nama') is-invalid @enderror"
                           placeholder="Masukkan nama lengkap"
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
                           value="{{ old('nip') }}"
                           class="form-control @error('nip') is-invalid @enderror"
                           placeholder="Masukkan NIP">

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
                           value="{{ old('nuptk') }}"
                           class="form-control @error('nuptk') is-invalid @enderror"
                           placeholder="Masukkan NUPTK">

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

                        <option value="">-- Pilih Jenis Kelamin --</option>

                        <option value="L"
                            {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="P"
                            {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
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
                           value="{{ old('jabatan') }}"
                           class="form-control @error('jabatan') is-invalid @enderror"
                           placeholder="Contoh: Guru Mata Pelajaran">

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
                           value="{{ old('mata_pelajaran') }}"
                           class="form-control @error('mata_pelajaran') is-invalid @enderror"
                           placeholder="Contoh: Bahasa Indonesia">

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
                           value="{{ old('pendidikan_terakhir') }}"
                           class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                           placeholder="Contoh: S1 Pendidikan Bahasa Indonesia">

                    @error('pendidikan_terakhir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Foto --}}
                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Foto
                    </label>

                    <input type="file"
                           name="foto"
                           accept="image/*"
                           class="form-control @error('foto') is-invalid @enderror">

                    <small class="text-muted">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
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
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

