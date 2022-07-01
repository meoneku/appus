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
                        <form action="/pinjam" method="post" class='form-control' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari Anggota" value="" required>
                                <input type="hidden" name="member_id" id="member_id">
                                <button class="btn btn-success" type="button"><i class="bi bi-search"></i></button>
                            </div>
                            <div class="container p-1">
                                <div class="row">
                                    <div class="col-xxl-12 col-md-12">
                                        <div class="card info-card borrow-card">
                                            <div class="card-body">
                                                <h5 class="card-title">Anggota | Peminjam <span></span></h5>
                                                <div class="row mb-3">
                                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="name" id="name" class="form-control" value="" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="member_number" class="col-sm-3 col-form-label">NIM</label>
                                                    <div class="col-sm-3">
                                                        <input type="number" name="member_number" id="member_number" class="form-control" value="" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="major_id" class="col-sm-3 col-form-label">Jurusan</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" name="major_id" id="major_id" class="form-control" value="" maxlength="200" readonly>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="return_date" class="col-sm-3 col-form-label">Tanggal Kembali</label>
                                                    <div class="col-sm-3">
                                                        <input type="date" name="return_date" id="return_date" class="form-control" value="" required>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mb-3 col-sm-12">
                                                    <a href="{{ url('pinjam') }}" class="btn btn-info me-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Pinjam</button>
                                                </div>
                                                <div class="">
                                                <h5 class="card-title">Buku | Dipinjam<span></span></h5>
                                                <div class="input-group">
                                                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari Buku" value="" disabled>
                                                    <input type="hidden" name="book" id="book" value="">
                                                    <button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i></button>
                                                </div>
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
                                                        <tr>
                                                            <td colspan="4">Belum Ada Data</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                  url:"{{ url('pinjam/getanggota') }}",
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
               $('#member_id').val(ui.item.value);
               $('#name').val(ui.item.name);
               $('#member_number').val(ui.item.nim);
               $('#major_id').val(ui.item.major);
               return false;
             }
          });
     
        });
        </script>

@endsection