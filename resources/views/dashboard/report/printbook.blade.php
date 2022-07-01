<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Cetak Laporan Buku</title>
</head>
<body class="container-fluid">
    <h1>{{ env('APP_ALIASES_NAME') }}</h1>
    <h5>{{ env('APP_ADDRESS_1') }}</h5>
    <h5>{{ env('APP_ADDRESS_2') }}</h5>
    <div class="mt-2">
        <table class="table table-striped">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        window.print();  
    </script>
</body>
</html>