@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Data Anggota <span>| Buat Baru</span></h5>
                        <form action="/anggota" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                            <div class="row mb-3">
                                <label for="member_name" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="member_name" id="member_name" class="form-control @error('member_name') is-invalid @enderror" value="{{ old('member_name') }}" maxlength="128" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="member_number" class="col-sm-4 col-form-label">NIM</label>
                                <div class="col-sm-6">
                                    <input type="number" name="member_number" id="member_number" class="form-control @error('member_number') is-invalid @enderror" value="{{ old('member_number') }}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Jurusan</label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('major_id') is-invalid @enderror" name="major_id" aria-label="multiple select example" required>
                                        <option value="" selected>Pilih Salah Satu</option>
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}">{{ $major->major }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="year" class="col-sm-4 col-form-label">Angkatan</label>
                                <div class="col-sm-4">
                                    <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" maxlength="4" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-4">
                                    <select class="form-select @error('gender') is-invalid @enderror" name="gender" aria-label="multiple select example" required>
                                        <option selected value="">Pilih Salah Satu</option>
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phonenumber" class="col-sm-4 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-6">
                                    <input type="number" name="phonenumber" id="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" value="{{ old('phonenumber') }}" maxlength="15" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="addres" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="addres" id="addres" class="form-control @error('addres') is-invalid @enderror" value="{{ old('addres') }}" maxlength="255" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="desc" class="col-sm-4 col-form-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{ old('desc') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="photo" class="col-sm-4 col-form-label">Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/*" onchange="preview()">
                                    <small class="text-muted"><i>* Maksimum Ukuran Foto 2 MB (2048 KB)</i></small><br>
                                    <img id="frame" src="" width="140px" height="140px" style="display:none"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3 col-sm-8">
                                <a href="{{ url('anggota') }}" class="btn btn-info me-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                                {{-- <button type="reset" class="btn btn-warning me-1"><i class="bi bi-x-circle"></i>Reset</button> --}}
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div><!-- End Main Card -->

        </div>
    </div><!-- End Left side columns -->
    <script>
        function preview() {
            frame.style.display = "block";
            frame.src=URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
