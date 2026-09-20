
<!DOCTYPE html>
<html lang="id" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" >
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-dark h-100 d-flex justify-content-center align-items-center">
    <div
        class="card border-0 shadow-lg rounded-4 p-4 w-100 mx-3"
        style="max-width: 450px;" >

        <div class="text-center mb-4">

            <img src="{{ asset('logo.smk.png') }}" alt="Logo SMK Negeri 1 Cijati"class="img-fluid d-block mx-auto mb-3"
                style="max-height: 90px;" >
            <h4 class="fw-bold text-primary mb-1">
                SMK Negeri 1 Cijati
            </h4>
            <p class="text-secondary mb-0">
                Sistem Informasi Sekolah
            </p>

        </div>


       
        <div class="text-center mb-4">

            <h5 class="fw-bold text-dark mb-2">
                Login Admin
            </h5>

            <p class="text-muted small mb-0">
                Silakan masuk untuk mengakses dashboard
            </p>

        </div>


   
        @if ($errors->any())

            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert"
            >

                <div class="d-flex align-items-start">

                    <i class="bi bi-exclamation-circle-fill me-2"></i>

                    <div>

                        <strong>Login gagal!</strong>

                        <ul class="mb-0 mt-1">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                </div>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        @endif


        @if (session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >

                <i class="bi bi-check-circle-fill me-2"></i>

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>

            </div>

        @endif


        <form action="{{ route('login.proses') }}" method="POST">

            @csrf

           
            <div class="mb-3">

                <label
                    for="email"
                    class="form-label fw-semibold"
                >
                    <i class="bi bi-envelope me-1 text-primary"></i>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control form-control-lg"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    autocomplete="email"
                    required
                    autofocus
                >

            </div>


         
            <div class="mb-4">

                <label
                    for="password"
                    class="form-label fw-semibold"
                >
                    <i class="bi bi-lock me-1 text-primary"></i>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control form-control-lg"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >

            </div>


           
            <div class="d-grid">

                <button
                    type="submit"
                    class="btn btn-primary btn-lg fw-semibold"
                >
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Login
                </button>

            </div>

        </form>

    </div>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>
</html>