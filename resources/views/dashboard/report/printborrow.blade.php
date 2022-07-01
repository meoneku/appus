<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <title>Cetak Laporan Pengembalian</title>
</head>
<body class="container-fluid">
    <h1>{{ env('APP_ALIASES_NAME') }}</h1>
    <h5>{{ env('APP_ADDRESS_1') }}</h5>
    <h5>{{ env('APP_ADDRESS_2') }}</h5>
    <h6>Report Peminjaman Buku</h6>
    <div class="mt-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Peminjaman</th>
                    <th>Nama Peminjam</th>
                    <th>Jurusan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Buku Yang Di Pinjam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $borrow->borrow_number }}</td>
                    <td>{{ $borrow->member->member_name }}</td>
                    <td>{{ $borrow->member->major->major }}</td>
                    <td>{{ date('d-m-Y', strtotime($borrow->borrow_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($borrow->return_date)) }}</td>
                    <td>
                        @foreach ($borrow->book as $book)
                            - {{ $book->title }} <br/>
                        @endforeach
                    </td>
                    <td>@if($borrow->flag == 'YN')Belum Kemballi @else Sudah Kembali @endif</td>
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