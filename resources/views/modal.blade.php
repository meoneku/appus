<div class="col-xxl-12 col-md-12">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Data Lengkap Koleksi Buku</h5>

            <div class="d-flex align-items-top">
                <div class="card-icon rounded-circle d-flex align-items-top justify-content-center ms-3">
                    <img src="{{ url('uploads') . '/' . $book->cover }}" alt="Cover" width="128px" height="128px">
                </div>
                <div class="ps-5">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td>{{ $book->title }}</td>
                            </tr>
                            <tr>
                                <td>ISBN</td>
                                <td>:</td>
                                <td>{{ $book->isbn }}</td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>{{ $book->book_number }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td>{{ $book->category->category }}</td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td>:</td>
                                <td>{{ $book->author }}</td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td>:</td>
                                <td>{{ $book->publisher }}</td>
                            </tr>
                            <tr>
                                <td>Terbit</td>
                                <td>:</td>
                                <td>{{ $book->public_year }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td>{{ $book->stock }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>@if($book->status == 0) Di Pinjam Semua @else Tersedia @endif</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>{{ $book->desc }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
