<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome {{ env('APP_NAME') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">{{ env('APP_NAME') }}</span>
      </a>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" action="/">
          <input type="text" name="search" placeholder="Cari Buku" value="{{ request('search') }}" title="Enter Untuk Mencari">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->
  
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
  
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Filter</span>
          </a><!-- End Profile Iamge Icon -->
          @php
          $tempsearch = '';
          if(request('search')){
            $tempsearch = 'search='.request('search').'&';
          }
          @endphp
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
                <a class="dropdown-item d-flex align-items-center" href="/">
                  @if(request('category'))
                  <i class="bi bi-dot"></i>
                  @else
                  <i class="bi bi-check-lg"></i>
                  @endif
                  <span>None</span>
                </a>
            </li>
            @foreach($categories as $category)
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/?{{ $tempsearch }}category={{ $category->id }}">
                @if($category->id == request('category'))
                <i class="bi bi-check-lg"></i>
                @else
                <i class="bi bi-dot"></i>
                @endif
                <span>{{ $category->category }}</span>
              </a>
            </li>
            @endforeach
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Koleksi Buku | <span>{{ $sFilter }}</span></h5>
                <div class="row">
                @foreach($books as $book)
                    <div class="col-xxl-6 col-md-12">
                        <div class="card info-card sales-card @if($book->status == 0) bg-warning @endif">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->author }} | <span>{{ $book->isbn }}</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <img src="{{ url('uploads').'/'.$book->cover }}" alt="Foto" width="64px" height="86px">
                                    </div>
                                    <div class="ps-3 mt-0">
                                        <span class="small pt-1 fw-bold">{{ $book->title }}</span><br>
                                        <span class="text-danger pt-1 fw-bold">{{ $book->category->category }}</span><br>
                                        <span class="text-success small pt-1 fw-bold">{{ $book->publisher }}</span><br><span class="text-primary small pt-1">Rak {{ $book->rack }}</span>
                                    </div>
                                 </div>
                                 <div class="d-flex justify-content-end pe-3">
                                    <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#details-modal" data-book="{{ $book->id }}"><i class="bi bi-eye"></i><small> Detail</small></button>
                                 </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
                </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-end me-4">
            {{ $books->links() }}
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <div class="modal fade" id="details-modal" tabindex="-1" aria-labelledby="details-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="isi00">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>{{ env('APP_NAME') }}</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="{{ url('assets/vendor/jquery/jquery.js') }}"></script>

    <script>
        $('#details-modal').on('show.bs.modal', event => {
          var book = $(event.relatedTarget).data('book');
          $.ajax({
            url: `/detail/${book}`, // the url for your show method
            method: 'get'
          })
          .done(data => $('.modal-body').html(data));
        });
    </script>

</body>

</html>