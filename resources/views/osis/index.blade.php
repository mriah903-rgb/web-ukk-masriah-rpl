@extends('layouts.app')

@section('title', 'OSIS - ' . ($profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati'))

@section('content')


<section class="bg-dark text-white py-5">

    <div class="container">

        <div class="text-center">

       
            <div class="mb-3">
                <span class="badge bg-warning text-dark px-3 py-2">
                    <i class="bi bi-people-fill me-1"></i>
                    ORGANISASI SISWA
                </span>
            </div>

       
            <h1 class="display-5 fw-bold mb-3">
                OSIS
            </h1>

            <h4 class="fw-semibold mb-3">
                {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
            </h4>

            <p class="lead text-white-50 mb-0">
                Mengenal struktur kepengurusan Organisasi Siswa
                Intra Sekolah beserta para pengurusnya.
            </p>

        </div>

    </div>

</section>



<section class="bg-white py-5">

    <div class="container">

        <div class="text-center">

         
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                PEMBINA OSIS
            </span>

        
            <div>
                <img
                    src="{{ asset('pakyoga.jpeg') }}"
                    alt="Foto Pembina OSIS"
                    class="img-fluid rounded-4 shadow border border-3 border-warning"
                    style="width: 260px; height: 320px; object-fit: cover;"
                >
            </div>

          
            <h5 class="fw-bold mt-3 mb-1">
                M MOCH. YOGA AGUNG NUGRAHA
            </h5>

            <p class="text-muted mb-0">
                {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}
            </p>

        </div>

    </div>

</section>



<section class="bg-light py-5">

    <div class="container">

       
        <div class="text-center mb-5">

            <span class="badge bg-dark text-warning px-3 py-2 mb-3">
                OSIS SMK NEGERI 1 CIJATI
            </span>

            

            <p class="text-muted mb-0">
                Mengenal para pengurus OSIS
                {{ $profil?->nama_sekolah ?? 'SMK Negeri 1 Cijati' }}.
            </p>

        </div>


 
        @if($osis->count() > 0)

            <div class="row g-4 justify-content-center">

                @foreach($osis as $item)

                    <div class="col-sm-6 col-md-4 col-lg-3">

                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">

                         
                            <div class="bg-dark text-center p-4">

                                @if($item->foto)

                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        alt="{{ $item->nama }}"
                                        class="img-fluid rounded-3 border border-3 border-warning"
                                        style="width: 150px; height: 170px; object-fit: cover;"
                                    >

                                @else

                                    <div
                                        class="bg-secondary rounded-3 d-flex align-items-center justify-content-center mx-auto"
                                        style="width: 150px; height: 170px;"
                                    >
                                        <i class="bi bi-person-fill text-white fs-1"></i>
                                    </div>

                                @endif

                            </div>


                            <div class="card-body text-center">

                                <h5 class="fw-bold mb-2">
                                    {{ $item->nama }}
                                </h5>

                                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                                    {{ $item->jabatan }}
                                </span>

                                <p class="text-muted small mb-3">
                                    {{ $item->keterangan ?? 'Pengurus OSIS' }}
                                </p>

                                <a
                                    href="{{ route('osis.show', $item->id) }}"
                                    class="btn btn-outline-dark btn-sm rounded-pill px-3"
                                >
                                    <i class="bi bi-eye me-1"></i>
                                    Lihat Profil
                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else


            <div class="text-center py-5">

                <div class="mb-3">
                    <i class="bi bi-people text-muted display-4"></i>
                </div>

                <h5 class="fw-bold">
                    Data Pengurus OSIS Belum Tersedia
                </h5>

                <p class="text-muted mb-0">
                    Data pengurus OSIS akan ditampilkan di halaman ini.
                </p>

            </div>

        @endif

    </div>

</section>



<section class="bg-white py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-7">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    TENTANG OSIS
                </span>

                <h2 class="fw-bold mb-4">
                    Organisasi Siswa Intra Sekolah
                </h2>

                <p class="text-muted">
                    OSIS merupakan organisasi yang menjadi wadah bagi siswa
                    untuk mengembangkan kemampuan kepemimpinan, tanggung jawab,
                    kreativitas, dan kerja sama di lingkungan sekolah.
                </p>

                <p class="text-muted mb-0">
                    Melalui berbagai kegiatan, pengurus OSIS diharapkan dapat
                    menjadi bagian dari upaya menciptakan lingkungan sekolah
                    yang aktif, positif, dan produktif.
                </p>

            </div>


            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4">

                        
                        <div class="d-flex align-items-start mb-4">

                            <div class="bg-dark text-warning rounded-3 p-3 me-3 flex-shrink-0">
                                <i class="bi bi-person-check-fill fs-4"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-1">
                                    Kepemimpinan
                                </h5>

                                <p class="text-muted small mb-0">
                                    Membentuk siswa yang bertanggung jawab
                                    dan mampu memimpin dengan baik.
                                </p>
                            </div>

                        </div>


                      
                        <div class="d-flex align-items-start mb-4">

                            <div class="bg-dark text-warning rounded-3 p-3 me-3 flex-shrink-0">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-1">
                                    Kerja Sama
                                </h5>

                                <p class="text-muted small mb-0">
                                    Membangun kebersamaan dan kemampuan
                                    bekerja dalam sebuah tim.
                                </p>
                            </div>

                        </div>


                   
                        <div class="d-flex align-items-start">

                            <div class="bg-dark text-warning rounded-3 p-3 me-3 flex-shrink-0">
                                <i class="bi bi-lightbulb-fill fs-4"></i>
                            </div>

                            <div>
                                <h5 class="fw-bold mb-1">
                                    Kreativitas
                                </h5>

                                <p class="text-muted small mb-0">
                                    Mendorong siswa untuk menghasilkan
                                    ide dan kegiatan yang positif.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="bg-light py-5">

    <div class="container">

        <div class="bg-dark text-white rounded-4 shadow p-4 p-md-5 text-center">

            <div class="mb-3">
                <i class="bi bi-stars text-warning display-5"></i>
            </div>

            <h2 class="fw-bold mb-3">
                Bersama Membangun Sekolah
            </h2>

            <p
                class="text-white-50 mb-0 mx-auto"
                style="max-width: 750px;"
            >
                OSIS menjadi wadah bagi siswa untuk belajar berorganisasi,
                mengembangkan potensi, serta berkontribusi dalam menciptakan
                kegiatan sekolah yang positif dan bermanfaat.
            </p>

        </div>

    </div>

</section>

@endsection