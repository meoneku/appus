<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - {{ env('APP_NAME') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/jquery/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="loader">
        <img src="{{ url('assets/img/loader.gif') }}" />
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ url('assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">{{ env('APP_NAME') }}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ url('uploads').'/'.auth()->user()->picture }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->username }}</h6>
                            <span>{{ auth()->user()->role }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/akun">
                                <i class="bi bi-gear"></i>
                                <span>Setting Akun</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown \Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- Dashboard Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === "home") ? '' : 'collapsed' }}" href="/dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <!-- Peminjaman Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === "pinjam") ? '' : 'collapsed' }}" href="/pinjam">
                    <i class="bi bi-cart-plus"></i>
                    <span>Peminjaman</span>
                </a>
            </li><!-- End Peminjaman Nav -->

            <!-- Pengembalian Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === "kembali") ? '' : 'collapsed' }}" href="/kembali">
                    <i class="bi bi-cart-check"></i>
                    <span>Pengembalian</span>
                </a>
            </li><!-- End Pengembalian Nav -->

            <!-- Anggota Nav-->
            <li class="nav-item">
                <a class="nav-link {{ ($active === 'anggota' or $active === 'jurusan') ? '' : 'collapsed' }}" data-bs-target="#anggota-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-badge"></i><span>Master Anggota</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="anggota-nav" class="nav-content {{ ($active === 'anggota' or $active === 'jurusan') ? '' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/anggota" class="{{ ($active === "anggota") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="/jurusan" class="{{ ($active === "jurusan") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Jurusan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Anggota Nav -->

            <!-- Buku Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === 'buku' or $active === 'kategori') ? '' : 'collapsed' }}" data-bs-target="#buku-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-book"></i><span>Master Buku</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="buku-nav" class="nav-content {{ ($active === 'buku' or $active === 'kategori') ? '' : 'collapse' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/buku" class="{{ ($active === "buku") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Buku</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kategori" class="{{ ($active === "kategori") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Kategori</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Buku Nav -->

            <!-- Report Nav-->
            <li class="nav-item">
                <a class="nav-link {{ ($active === 'report buku' or $active === 'report kembali' or $active === 'report peminjaman') ? '' : 'collapsed' }}" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Report</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="report-nav" class="nav-content {{ ($active === 'report buku' or $active === 'report kembali' or $active === 'report peminjaman') ? '' : 'collapse' }} " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/rbuku" class="{{ ($active === "report buku") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Report Buku</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="/rpinjam" class="{{ ($active === "report peminjaman") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Report Peminjaman</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="/rkembali" class="{{ ($active === "report kembali") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Report Pengembalian</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Report Nav -->

            <!-- Cetak Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === 'kartu anggota' or $active === 'barcode') ? '' : 'collapsed' }}" data-bs-target="#cetak-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-printer"></i><span>Cetak</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="cetak-nav" class="nav-content {{ ($active === 'kartu anggota' or $active === 'barcode') ? '' : 'collapse' }} " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/panggota" class="{{ ($active === "kartu anggota") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Cetak Kartu Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="/pbuku" class="{{ ($active === "barcode") ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Cetak Barcode Buku</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Cetak Nav -->

            <li class="nav-heading">Etc</li>

            <!-- Petugas Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === "petugas") ? '' : 'collapsed' }}" href="{{ url('/user') }}">
                    <i class="bi bi-person-plus"></i>
                    <span>Petugas</span>
                </a>
            </li><!-- End Petugas Nav -->

            <!-- Akun Nav -->
            <li class="nav-item">
                <a class="nav-link {{ ($active === "akun") ? '' : 'collapsed' }}" href="/akun">
                    <i class="bi bi-gear"></i>
                    <span>Setting Akun</span>
                </a>
            </li><!-- End Akun Nav -->

            <!-- Sign Out Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </a>
            </li><!-- End Sign Out Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                @yield('container')

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ env('APP_NAME ')}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script>
        //hide the loader after page is loaded fully
        var loader = document.getElementById("loader");
        window.addEventListener("load", function () {
          loader.style.height = "100%";
          loader.style.width = "100%";
      
          loader.style.borderRadius = "50%";
          loader.style.visibility = "hidden";
        });
    </script>

</body>

</html>
