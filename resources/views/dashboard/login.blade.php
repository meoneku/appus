<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">{{ env('APP_NAME')}}</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Masuk Ke Admin</h5>
                                        <p class="text-center small">Masukkan Username & Sandi</p>
                                    </div>
                                    @if (session()->has('loginErr'))
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <div>
                                                {{ session('loginErr') }}
                                            </div>
                                        </div>
                                    @endif
                                    <form method="post" action="/login" class="row g-3 needs-validation"
                                        enctype="multipart/form-data" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror"
                                                    id="yourUsername" value="{{ old('username') }}" required>
                                                <div class="invalid-feedback">Masukkan Username</div>
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ @message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Sandi</label>
                                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                                            <div class="invalid-feedback">Masukkan Kata Sandi</div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                               
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href=" #" class="back-to-top d-flex align-items-center justify-content-center"><i
                                        class="bi bi-arrow-up-short"></i></a>

                                <!-- Vendor JS Files -->
                                <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                                <!-- Template Main JS File -->
                                <script src="assets/js/main.js"></script>

</body>

</html>
