<table>
    <thead>
        <tr>
            <th>no</th>
            <th>judul</th>
            <th>isbn</th>
            <th>nomor_buku</th>
            <th>kategori</th>
            <th>penerbit</th>
            <th>penulis</th>
            <th>rak</th>
            <th>tahun_terbit</th>
            <th>jumlah</th>
            <th>deskripsi</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>judul-judulan</td>
            <td>1111-2222-3333</td>
            <td>1001</td>
            <td>1 (isi dengan ID atau kode kategori)</td>
            <td>CV. Terbit Tenggelam</td>
            <td>Sang Penulis Bayangan</td>
            <td>2B</td>
            <td>2045</td>
            <td>2</td>
            <td>deskripsi diri</td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>ID/Kode Kategori</strong></td>
            <td>Kategori</td>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>{{ $category->id }}</strong></td>
            <td>{{ $category->category }}</td>
        </tr>
        @endforeach
    </tbody>
</table>