<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registrasi</title>

    {{-- Bootstrap 5.3 --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    {{-- Bootstrap Icons --}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >
</head>

<body class="bg-dark">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4 p-md-5">

                
                    <div class="text-center mb-4">
                        <img
                    src="{{ asset('logo.smk.png') }}"
                    alt="Logo SMK Negeri 1 Cijati"
                    class="img-fluid d-block mx-auto mb-3"
                    style="max-height: 90px;"
                     >
                     <small class="text-secondary">
                            SMK Negeri 1 Cijati
                        </small>

                    </div>


                
                    <div class="text-center mb-4">

                        <h4 class="fw-bold text-dark">
                            Registrasi Akun
                        </h4>

                        <p class="text-secondary small mb-0">
                            Silakan buat akun untuk mengakses sistem
                        </p>

                    </div>


                
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <div class="d-flex">

                                <i class="bi bi-exclamation-circle-fill me-2"></i>

                                <div>

                                    <strong>Registrasi gagal!</strong>

                                    <ul class="mb-0 mt-1">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                   
                    <form action="{{ route('register.store') }}" method="POST">

                        @csrf


                 
                        <div class="mb-3">

                            <label
                                for="name"
                                class="form-label fw-semibold"
                            >
                                <i class="bi bi-person-fill text-warning"></i>
                                Nama
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control form-control-lg"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama lengkap"
                                required
                                autofocus>

                        </div>
                        <div class="mb-3">
                            <label
                                for="email"
                                class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill text-warning"></i>
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control form-control-lg"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                required
                            >

                        </div>
                        <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill text-warning"></i>
                                Password
                            </label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Masukkan password" required >
                        </div>
                        <div class="mb-4">
                            <label  for="password_confirmation" class="form-label fw-semibold">
                                <i class="bi bi-shield-lock-fill text-warning"></i>
                                Konfirmasi Password
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-lg"
                            placeholder="Ulangi password"
                             required>
                        </div>
                        <div class="d-grid">
                            <button
                                type="submit"
                                class="btn btn-warning btn-lg fw-semibold" >
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Daftar
                            </button>

                        </div>

                    </form>
                    <div class="text-center mt-4">
                        <span class="text-secondary">
                            Sudah punya akun?
                        </span>

                        <a href="{{ route('login') }}"class="link-warning fw-semibold text-decoration-none" >
                            Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>

