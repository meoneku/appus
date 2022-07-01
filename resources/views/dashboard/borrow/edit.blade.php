@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Peminjaman <span>| Buku</span></h5>
                        <div class="mb-3 col-md-12">
                    </div>
                            <div class="input-group">
                                <input type="text" name="search1" id="search1" class="form-control" placeholder="Cari Anggota" value="" disabled>
                                <input type="hidden" name="member_id" id="member_id">
                                <button class="btn btn-success" type="button"><i class="bi bi-search"></i></button>
                            </div>
                            @if(session()->has('warning'))
                            <div class="alert alert-warning mt-3" role="alert">
                                {{ session('warning') }}
                            </div>
                            @endif
                            <div class="container p-1">
                                <div class="row">
                                    <div class="col-xxl-12 col-md-12">
                                        <div class="card info-card borrow-card">
                                            <div class="card-body">
                                                <h5 class="card-title">Anggota | Peminjam <span></span></h5>
                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" id="name" class="form-control" value="{{ $borrow->member->member_name }}" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="member_number" class="col-sm-3 col-form-label">NIM</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" name="member_number" id="member_number" class="form-control" value="{{ $borrow->member->member_number }}" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="major_id" class="col-sm-3 col-form-label">Jurusan</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="major_id" id="major_id" class="form-control" value="{{ $borrow->major->major }}" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="return_date" class="col-sm-3 col-form-label">Tanggal Kembali</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="return_date" id="return_date" class="form-control" value="{{ date('d-m-Y', strtotime($borrow->return_date)) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="">
                                                <h5 class="card-title">Buku | Dipinjam<span></span></h5>
                                                <form action="/pinjam/buku/{{ $borrow->id }}" method="post" class="form-control" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="input-group">
                                                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari Buku" value="" required>
                                                    <input type="hidden" name="book_id" id="book_id" value="">
                                                    <button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i></button>
                                                </div>
                                                </form>
                                                <table class="table table-sm mt-3">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul</th>
                                                            <th>Kategori</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($borrow->book as $book)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $book->title }}</td>
                                                            <td>{{ $book->category->category }}</td>
                                                            <td>
                                                                <form action="/pinjam/buku/{{ $book->id }}" method="post" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <input type="hidden" name="borrow_id" value="{{ $borrow->id }}">
                                                                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin Akan Di Hapus?')"><i class="bi bi-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-end mb-3 col-sm-12">
                                                    <a href="{{ url('pinjam') }}" class="btn btn-info me-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                                    <a href="{{ url('pinjam') }}/cetak/{{ $borrow->id }}" class="btn btn-primary me-1" target="_blank"><i class="bi bi-printer"></i> Cetak Tanda Terima</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div><!-- End Main Card -->
        </div>
    </div><!-- End Left side columns -->

    <script src="{{ url('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery/jquery-ui.min.js') }}"></script>

    <script type="text/javascript">

        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
     
          $( "#search" ).autocomplete({
             source: function( request, response ) {
                // Fetch data
                $.ajax({
                  url:"{{ url('pinjam/getbuku') }}",
                  type: 'post',
                  dataType: "json",
                  data: {
                     _token: CSRF_TOKEN,
                     search: request.term
                  },
                  success: function( data ) {
                     response( data );
                  }
                });
             },
             select: function (event, ui) {
               // Set selection
               $('#search').val(ui.item.label);
               $('#book_id').val(ui.item.value);
               return false;
             }
          });
     
        });
        </script>

@endsection