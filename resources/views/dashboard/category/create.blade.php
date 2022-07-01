@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Data Kategori <span>| Buat Baru</span></h5>
                        <form action="/kategori" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row mb-3">
                                <label for="category" class="col-sm-2 col-form-label">Nama Kategori</label>
                                <div class="col-sm-6">
                                    <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" maxlength="128" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="abbreviation" class="col-sm-2 col-form-label">Singkatan</label>
                                <div class="col-sm-6">
                                    <input type="text" name="abbreviation" id="abbreviation" class="form-control @error('abbreviation') is-invalid @enderror" value="{{ old('abbreviation') }}" maxlength="5" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3 col-sm-8">
                                <a href="{{ url('kategori') }}" class="btn btn-info me-1"><i
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
