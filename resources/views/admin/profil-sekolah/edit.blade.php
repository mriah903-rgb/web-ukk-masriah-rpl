@extends('layouts.admin')

@section('title', 'Edit Profil Sekolah')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">
        <h1 class="fw-bold mb-1">
            Edit Profil Sekolah
        </h1>

        <p class="text-muted mb-0">
            Perbarui informasi profil sekolah
        </p>
    </div>


    {{-- Error validasi --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan!</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- Form --}}
    <form action="{{ route('admin.profilsekolah.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')


        {{-- ===================================== --}}
        {{-- IDENTITAS SEKOLAH --}}
        {{-- ===================================== --}}

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">
                    Identitas Sekolah
                </h5>

            </div>


            <div class="card-body">

                <div class="row">

                    {{-- Nama Sekolah --}}
                    <div class="col-md-8 mb-3">

                        <label for="nama_sekolah" class="form-label fw-bold">
                            Nama Sekolah
                        </label>

                        <input type="text"
                               name="nama_sekolah"
                               id="nama_sekolah"
                               class="form-control @error('nama_sekolah') is-invalid @enderror"
                               value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                               required>

                        @error('nama_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NPSN --}}
                    <div class="col-md-4 mb-3">

                        <label for="npsn" class="form-label fw-bold">
                            NPSN
                        </label>

                        <input type="text"
                               name="npsn"
                               id="npsn"
                               class="form-control @error('npsn') is-invalid @enderror"
                               value="{{ old('npsn', $profil->npsn) }}">

                        @error('npsn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Status Sekolah --}}
                    <div class="col-md-6 mb-3">

                        <label for="status_sekolah" class="form-label fw-bold">
                            Status Sekolah
                        </label>

                        <select name="status_sekolah"
                                id="status_sekolah"
                                class="form-select @error('status_sekolah') is-invalid @enderror">

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option value="Negeri"
                                {{ old('status_sekolah', $profil->status_sekolah) == 'Negeri' ? 'selected' : '' }}>
                                Negeri
                            </option>

                            <option value="Swasta"
                                {{ old('status_sekolah', $profil->status_sekolah) == 'Swasta' ? 'selected' : '' }}>
                                Swasta
                            </option>

                        </select>

                        @error('status_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Bentuk Pendidikan --}}
                    <div class="col-md-6 mb-3">

                        <label for="bentuk_pendidikan" class="form-label fw-bold">
                            Bentuk Pendidikan
                        </label>

                        <input type="text"
                               name="bentuk_pendidikan"
                               id="bentuk_pendidikan"
                               class="form-control @error('bentuk_pendidikan') is-invalid @enderror"
                               value="{{ old('bentuk_pendidikan', $profil->bentuk_pendidikan) }}"
                               placeholder="Contoh: SMK">

                        @error('bentuk_pendidikan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Kepala Sekolah --}}
                    <div class="col-md-6 mb-3">

                        <label for="kepala_sekolah" class="form-label fw-bold">
                            Kepala Sekolah
                        </label>

                        <input type="text"
                               name="kepala_sekolah"
                               id="kepala_sekolah"
                               class="form-control @error('kepala_sekolah') is-invalid @enderror"
                               value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}">

                        @error('kepala_sekolah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Akreditasi --}}
                    <div class="col-md-6 mb-3">

                        <label for="akreditasi" class="form-label fw-bold">
                            Akreditasi
                        </label>

                        <select name="akreditasi"
                                id="akreditasi"
                                class="form-select @error('akreditasi') is-invalid @enderror">

                            <option value="">
                                -- Pilih Akreditasi --
                            </option>

                            <option value="A"
                                {{ old('akreditasi', $profil->akreditasi) == 'A' ? 'selected' : '' }}>
                                A
                            </option>

                            <option value="B"
                                {{ old('akreditasi', $profil->akreditasi) == 'B' ? 'selected' : '' }}>
                                B
                            </option>

                            <option value="C"
                                {{ old('akreditasi', $profil->akreditasi) == 'C' ? 'selected' : '' }}>
                                C
                            </option>

                            <option value="Belum Terakreditasi"
                                {{ old('akreditasi', $profil->akreditasi) == 'Belum Terakreditasi' ? 'selected' : '' }}>
                                Belum Terakreditasi
                            </option>

                        </select>

                        @error('akreditasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Logo --}}
                    <div class="col-md-12 mb-3">

                        <label for="logo" class="form-label fw-bold">
                            Logo Sekolah
                        </label>

                        @if($profil->logo)

                            <div class="mb-3">

                                <img src="{{ asset('storage/' . $profil->logo) }}"
                                     alt="Logo {{ $profil->nama_sekolah }}"
                                     width="120"
                                     height="120"
                                     class="border rounded p-2"
                                     style="object-fit: contain;">

                            </div>

                        @endif


                        <input type="file"
                               name="logo"
                               id="logo"
                               class="form-control @error('logo') is-invalid @enderror"
                               accept="image/*">

                        <div class="form-text">
                            Kosongkan jika tidak ingin mengganti logo.
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </div>

                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================== --}}
        {{-- ALAMAT --}}
        {{-- ===================================== --}}

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">
                    Alamat Sekolah
                </h5>

            </div>


            <div class="card-body">

                <div class="row">

                    {{-- Alamat Jalan --}}
                    <div class="col-md-12 mb-3">

                        <label for="alamat_jalan" class="form-label fw-bold">
                            Alamat Jalan
                        </label>

                        <textarea name="alamat_jalan"
                                  id="alamat_jalan"
                                  rows="3"
                                  class="form-control @error('alamat_jalan') is-invalid @enderror">{{ old('alamat_jalan', $profil->alamat_jalan) }}</textarea>

                        @error('alamat_jalan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Desa/Kelurahan --}}
                    <div class="col-md-6 mb-3">

                        <label for="desa_kelurahan" class="form-label fw-bold">
                            Desa/Kelurahan
                        </label>

                        <input type="text"
                               name="desa_kelurahan"
                               id="desa_kelurahan"
                               class="form-control @error('desa_kelurahan') is-invalid @enderror"
                               value="{{ old('desa_kelurahan', $profil->desa_kelurahan) }}">

                        @error('desa_kelurahan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Kecamatan --}}
                    <div class="col-md-6 mb-3">

                        <label for="kecamatan" class="form-label fw-bold">
                            Kecamatan
                        </label>

                        <input type="text"
                               name="kecamatan"
                               id="kecamatan"
                               class="form-control @error('kecamatan') is-invalid @enderror"
                               value="{{ old('kecamatan', $profil->kecamatan) }}">

                        @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Kabupaten/Kota --}}
                    <div class="col-md-6 mb-3">

                        <label for="kabupaten_kota" class="form-label fw-bold">
                            Kabupaten/Kota
                        </label>

                        <input type="text"
                               name="kabupaten_kota"
                               id="kabupaten_kota"
                               class="form-control @error('kabupaten_kota') is-invalid @enderror"
                               value="{{ old('kabupaten_kota', $profil->kabupaten_kota) }}">

                        @error('kabupaten_kota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Provinsi --}}
                    <div class="col-md-6 mb-3">

                        <label for="provinsi" class="form-label fw-bold">
                            Provinsi
                        </label>

                        <input type="text"
                               name="provinsi"
                               id="provinsi"
                               class="form-control @error('provinsi') is-invalid @enderror"
                               value="{{ old('provinsi', $profil->provinsi) }}">

                        @error('provinsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Kode Pos --}}
                    <div class="col-md-4 mb-3">

                        <label for="kode_pos" class="form-label fw-bold">
                            Kode Pos
                        </label>

                        <input type="text"
                               name="kode_pos"
                               id="kode_pos"
                               class="form-control @error('kode_pos') is-invalid @enderror"
                               value="{{ old('kode_pos', $profil->kode_pos) }}">

                        @error('kode_pos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================== --}}
        {{-- KONTAK --}}
        {{-- ===================================== --}}

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">
                    Kontak Sekolah
                </h5>

            </div>


            <div class="card-body">

                <div class="row">

                    {{-- Telepon --}}
                    <div class="col-md-4 mb-3">

                        <label for="telepon" class="form-label fw-bold">
                            Telepon
                        </label>

                        <input type="text"
                               name="telepon"
                               id="telepon"
                               class="form-control @error('telepon') is-invalid @enderror"
                               value="{{ old('telepon', $profil->telepon) }}">

                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Email --}}
                    <div class="col-md-4 mb-3">

                        <label for="email" class="form-label fw-bold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $profil->email) }}">

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Website --}}
                    <div class="col-md-4 mb-3">

                        <label for="website" class="form-label fw-bold">
                            Website
                        </label>

                        <input type="text"
                               name="website"
                               id="website"
                               class="form-control @error('website') is-invalid @enderror"
                               value="{{ old('website', $profil->website) }}">

                        @error('website')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

        </div>


        {{-- ===================================== --}}
        {{-- VISI, MISI, SEJARAH --}}
        {{-- ===================================== --}}

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="fw-bold mb-0">
                    Visi, Misi, dan Sejarah
                </h5>

            </div>


            <div class="card-body">

                {{-- Visi --}}
                <div class="mb-3">

                    <label for="visi" class="form-label fw-bold">
                        Visi
                    </label>

                    <textarea name="visi"
                              id="visi"
                              rows="4"
                              class="form-control @error('visi') is-invalid @enderror">{{ old('visi', $profil->visi) }}</textarea>

                    @error('visi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Misi --}}
                <div class="mb-3">

                    <label for="misi" class="form-label fw-bold">
                        Misi
                    </label>

                    <textarea name="misi"
                              id="misi"
                              rows="6"
                              class="form-control @error('misi') is-invalid @enderror">{{ old('misi', $profil->misi) }}</textarea>

                    @error('misi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Sejarah --}}
                <div class="mb-3">

                    <label for="sejarah" class="form-label fw-bold">
                        Sejarah Sekolah
                    </label>

                    <textarea name="sejarah"
                              id="sejarah"
                              rows="8"
                              class="form-control @error('sejarah') is-invalid @enderror">{{ old('sejarah', $profil->sejarah) }}</textarea>

                    @error('sejarah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>


        {{-- Tombol --}}
        <div class="d-flex justify-content-end gap-2 mb-5">

            <a href="{{ route('admin.profilsekolah.index') }}"
               class="btn btn-secondary">
                Batal
            </a>

            <button type="submit"
                    class="btn btn-primary">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection