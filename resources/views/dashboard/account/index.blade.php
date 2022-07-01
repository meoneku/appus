@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Ganti <span>| Password</span></h5>
                        <div class="mb-3 col-md-12">
                            @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <form action="/akun" method="post" class="form-control" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="old_password" class="col-sm-2 col-form-label">Password Lama</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" value="{{ old('old_password') }}" maxlength="128" required autofocus>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="new_password" class="col-sm-2 col-form-label">Password Baru</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}" maxlength="128" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="new_password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" value="{{ old('new_password_confirmation') }}" maxlength="128" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-3 col-sm-8">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Ganti Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- End Main Card -->

        </div>
    </div><!-- End Left side columns -->
@endsection
