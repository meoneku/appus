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
                        <form action="/kembali" method="post" class='form-control' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari Peminjam" value="" readonly>
                                <input type="hidden" name="borrow_id" id="borrow_id" value="{{ $borrow->id }}">
                                <input type="hidden" name="late" id="late" value="{{ $late }}">
                                <button class="btn btn-success" type="button"><i class="bi bi-search"></i></button>
                            </div>
                            <div class="container p-1">
                                <div class="row">
                                    <div class="col-xxl-12 col-md-12">
                                        <div class="card info-card borrow-card">
                                            <div class="card-body">
                                                <h5 class="card-title">Anggota | Peminjam <span></span></h5>
                                                @if ($fine != 'Rp. 0')
                                                <div class="alert alert-danger" role="alert">
                                                    Terjadi Keterlambatan Pengembalian
                                                </div>
                                                @endif
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
                                                <div class="row mb-3">
                                                    <label for="fine" class="col-sm-3 col-form-label">Denda</label>
                                                    <div class="col-sm-3">
                                                        <input type="text" name="fine" id="fine" class="form-control" value="{{ $fine }}" required>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <span class="text-danger small">Denda Per Hari {{ env('FINE_DAY') }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end mb-3 col-sm-12">
                                                    <a href="{{ url('kembali/tambah') }}" class="btn btn-info me-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
                                                </div>
                                                <div class="">
                                                    <h5 class="card-title">Buku Yang Dipinjam<span></span></h5>
                                                    <table class="table table-sm mt-3">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul</th>
                                                                <th>Kategori</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($borrow->book as $book)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $book->title }}</td>
                                                                <td>{{ $book->category->category }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- End Main Card -->
        </div>
    </div><!-- End Left side columns -->

    <script src="{{ url('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery/jquery-ui.min.js') }}"></script>

    <script type="text/javascript">
        var dengan_rupiah = document.getElementById('fine');
        dengan_rupiah.addEventListener('keyup', function(e)
        {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
    
        /* Fungsi */
        function formatRupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
        
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

@endsection