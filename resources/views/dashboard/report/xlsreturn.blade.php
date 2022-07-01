<table>
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
                    <td valign="top">{{ $loop->iteration }}</td>
                    <td valign="top">{{ $reversion->borrow->borrow_number }}</td>
                    <td valign="top">{{ $reversion->member->member_name }}</td>
                    <td valign="top">{{ $reversion->member->major->major }}</td>
                    <td valign="top">{{ date('d-m-Y', strtotime($reversion->borrow->borrow_date)) }}</td>
                    <td valign="top">{{ date('d-m-Y', strtotime($reversion->borrow->return_date)) }}</td>
                    <td valign="top">{{ date('d-m-Y', strtotime($reversion->return_date)) }}</td>
                    <td valign="top">{{ $reversion->fine }}</td>
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