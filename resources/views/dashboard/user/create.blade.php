@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Data Petugas <span>| Buat Baru</span></h5>
                        <form action="/user" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-6">
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" maxlength="128" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" maxlength="64" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" maxlength="64" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('role') is-invalid @enderror" name="role" aria-label="multiple select example" required>
                                        <option selected value="">Pilih Salah Satu</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Pustakawan">Pustakawan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="picture" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-6">
                                    <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror" accept="image/*" onchange="previewImage()">
                                    <img class="img-preview img-fluid">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3 col-sm-8">
                                <a href="{{ url('user') }}" class="btn btn-info me-1"><i
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
    <script>
        function previewImage() {
            const image = document.querySelector('#picture');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
