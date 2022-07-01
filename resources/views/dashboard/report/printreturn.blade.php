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
    <h6>Report Pengembalian Buku</h6>
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
                    <th>Tanggal Dikembalikan</th>
                    <th>Denda</th>  
                    <th>Buku Yang Di Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reversions as $reversion)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reversion->borrow->borrow_number }}</td>
                    <td>{{ $reversion->member->member_name }}</td>
                    <td>{{ $reversion->member->major->major }}</td>
                    <td>{{ date('d-m-Y', strtotime($reversion->borrow->borrow_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($reversion->borrow->return_date)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($reversion->return_date)) }}</td>
                    <td>{{ $reversion->fine }}</td>
                    <td>
                        @php $borrows = \App\Models\Borrow::find($reversion->borrow_id) @endphp
                        @foreach ($borrows->book as $book)
                            - {{ $book->title }} <br/>
                        @endforeach
                    </td>
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