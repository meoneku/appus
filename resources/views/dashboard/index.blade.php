@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Card 1 -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Buku</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-book-half"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countBook }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Card 1 -->

            <!-- Card 2 -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Anggota</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countMember }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Card 2 -->

            <!-- Card 3 -->
            <div class="col-xxl-4 col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah <span>| Peminjaman</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $countBorrow }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Card 3 -->

            <!-- Main Card -->
            <div class="col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Buku Sering Di Pinjam</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th> 
                                    <th scope="col">Judul Buku</th> 
                                    <th scope="col">Kategori</th> 
                                    <th scope="col">Jumlah Di Pinjam</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->category->category }}</td>
                                    <td>{{ $book->borrow_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- End Main Card -->

        </div>
    </div><!-- End Left side columns -->
@endsection
