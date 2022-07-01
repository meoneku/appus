@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Master <span>| Import Data</span></h5>
                        <div class="mb-3 col-md-12">
                    </div>
                        <form action="/import/anggota" method="post" class='form-control' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" required>
                                <button class="btn btn-success" type="submit"><i class="bi bi-file-earmark-arrow-up"></i> Import</button>
                            </div>
                        </form>
                        <div class="alert alert-success mt-2" role="alert">
                            <li>Untuk template File Excel Dapat di Unduh <a href="/import/templateanggota" targer="_blank">Di Sini</a></li>
                            <li>Saat menggunakan Import, Untuk data Foto tidak dapat di proses, silahkan Edit Manual</li>
                        </div>
                        <table class="table table-sm mt-3">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Angkatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" align="center">Belum Ada Data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Main Card -->
        </div>
    </div><!-- End Left side columns -->
@endsection