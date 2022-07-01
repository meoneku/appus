@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Data Jurusan <span>| Buat Baru</span></h5>
                        <form action="/jurusan" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row mb-3">
                                <label for="major" class="col-sm-2 col-form-label">Nama Jurusan</label>
                                <div class="col-sm-6">
                                    <input type="text" name="major" id="major" class="form-control @error('major') is-invalid @enderror" value="{{ old('major') }}" maxlength="64" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="designation" class="col-sm-2 col-form-label">Singkatan</label>
                                <div class="col-sm-6">
                                    <input type="text" name="designation" id="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation') }}" maxlength="10" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3 col-sm-8">
                                <a href="{{ url('jurusan') }}" class="btn btn-info me-1"><i
                                        class="bi bi-arrow-left-circle"></i> Kembali</a>
                                <button type="reset" class="btn btn-warning me-1"><i class="bi bi-x-circle"></i>
                                    Reset</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- End Main Card -->

        </div>
    </div><!-- End Left side columns -->
@endsection
