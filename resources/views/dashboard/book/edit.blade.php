@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Data Buku <span>| Buat Baru</span></h5>
                        <form action="/buku/{{ $book->id }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-sm-4 col-form-label">Judul Buku</label>
                                <div class="col-sm-8">
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $book->title) }}" maxlength="200" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="isbn" class="col-sm-4 col-form-label">ISBN</label>
                                <div class="col-sm-4">
                                    <input type="number" name="isbn" id="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn', $book->isbn) }}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="book_number" class="col-sm-4 col-form-label">Nomor Buku</label>
                                <div class="col-sm-4">
                                    <input type="number" name="book_number" id="book_number" class="form-control @error('book_number') is-invalid @enderror" value="{{ old('book_number', $book->book_number) }}" maxlength="20" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label">Kategory</label>
                                <div class="col-sm-6">
                                    <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" aria-label="multiple select example" required>
                                        @foreach ($categories as $category)
                                            @if(old('category_id', $book->category_id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="author" class="col-sm-4 col-form-label">Penulis</label>
                                <div class="col-sm-6">
                                    <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author', $book->author) }}" maxlength="128" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="publisher" class="col-sm-4 col-form-label">Penerbit</label>
                                <div class="col-sm-6">
                                    <input type="text" name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher', $book->publisher) }}" maxlength="128" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="public_year" class="col-sm-4 col-form-label">Tahun Terbit</label>
                                <div class="col-sm-2">
                                    <input type="text" name="public_year" id="public_year" class="form-control @error('public_year') is-invalid @enderror" value="{{ old('public_year', $book->public_year) }}" maxlength="4" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stock" class="col-sm-4 col-form-label">Jumlah</label>
                                <div class="col-sm-2">
                                    <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $book->stock) }}" maxlength="5" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="rack" class="col-sm-4 col-form-label">Tempat Rak</label>
                                <div class="col-sm-3">
                                    <input type="text" name="rack" id="rack" class="form-control @error('rack') is-invalid @enderror" value="{{ old('rack', $book->rack) }}" maxlength="64" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="desc" class="col-sm-4 col-form-label">Deskripsi</label>
                                <div class="col-sm-8">
                                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $book->desc) }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cover" class="col-sm-4 col-form-label">Cover</label>
                                <div class="col-sm-8">
                                    <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror" accept="image/*" onchange="preview()">
                                    <small class="text-muted"><i>* Maksimum Ukuran Cover 2 MB (2048 KB)</i></small><br>
                                    <img id="frame" src="{{ url('uploads').'/'.$book->cover }}" width="140px" height="140px" style="display:none"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-3 col-sm-8">
                                <a href="{{ url('buku') }}" class="btn btn-info me-1"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
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
