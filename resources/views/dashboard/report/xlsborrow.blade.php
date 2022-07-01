<table>
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
                    <td valign="top">{{ $loop->iteration }}</td>
                    <td valign="top">{{ $borrow->borrow_number }}</td>
                    <td valign="top">{{ $borrow->member->member_name }}</td>
                    <td valign="top">{{ $borrow->member->major->major }}</td>
                    <td valign="top">{{ date('d-m-Y', strtotime($borrow->borrow_date)) }}</td>
                    <td valign="top">{{ date('d-m-Y', strtotime($borrow->return_date)) }}</td>
                    <td>
                        @foreach ($borrow->book as $book)
                            - {{ $book->title }} <br/>
                        @endforeach
                    </td>
                    <td  valign="top">@if($borrow->flag == 'YN')Belum Kemballi @else Sudah Kembali @endif</td>
                </tr>
                @endforeach
    </tbody>
</table>