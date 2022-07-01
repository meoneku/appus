@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengembalian <span>| Buku</span></h5>
                        <div class="mb-3 col-md-12">
                    </div>
                        <form action="/kembali/review" method="post" class='form-control' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari Peminjam" value="" required>
                                <input type="hidden" name="borrow_id" id="borrow_id">
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
                                                        <input type="text" name="return_date" id="return_date" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mb-3 col-sm-12">
                                                    <a href="{{ url('kembali') }}" class="btn btn-info me-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                                    <button type="submit" class="btn btn-success"><i class="bi bi-arrow-right-circle"></i> Lanjut</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                  url:"{{ url('kembali/getpinjam') }}",
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
               $('#borrow_id').val(ui.item.value);
               $('#name').val(ui.item.name);
               $('#member_number').val(ui.item.nim);
               $('#major_id').val(ui.item.major);
               $('#return_date').val(ui.item.date);
               return false;
             }
          });
     
        });
        </script>

@endsection