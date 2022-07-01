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
                        <form action="/import/importanggota" method="post" class='form-control' enctype="multipart/form-data">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" name="file" value="{{ $file }}">
                                <input type="file" name="none" class="form-control" disabled required>
                                <a href="/anggota" class="btn btn-warning" ><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                <button class="btn btn-success" type="submit"><i class="bi bi-file-earmark-arrow-up"></i> Proses Import</button>
                            </div>
                        </form>
                        <div class="alert alert-success mt-2" role="alert">
                            <li>Untuk template File Excel Dapat di Unduh <a href="" targer="_blank">Di Sini</a></li>
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
                                @for ($i = 0; $i < $CountRows; $i++)
                                <tr>
                                    <td>{{ $rows[$i]['no'] }}</td>
                                    <td>{{ $rows[$i]['nim'] }}</td>
                                    <td>{{ $rows[$i]['nama'] }}</td>
                                    <td>{{ $majors->where('id', $rows[$i]['jurusan'])->first()->major }}</td>
                                    <td>{{ $rows[$i]['angkatan'] }}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Main Card -->
        </div>
    </div><!-- End Left side columns -->
@endsection