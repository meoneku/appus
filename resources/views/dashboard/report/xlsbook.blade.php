<table>
    <thead>
        <tr>
            <th>No</th>
            <th>No ISBN</th>
            <th>Judul Buku</th>
            <th>Kategori</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->category->category }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->public_year }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->desc }}</td>
            </tr>
        @endforeach
    </tbody>
</table>