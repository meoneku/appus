<table>
    <thead>
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>nim</th>
            <th>jurusan</th>
            <th>angkatan</th>
            <th>jenis_kelamin</th>
            <th>hp</th>
            <th>alamat</th>
            <th>ket</th>
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
            <td>Boy Aldi Fariska</td>
            <td>1122334455</td>
            <td>1 (isi dengan ID atau kode jurusan)</td>
            <td>2023</td>
            <td>Laki-Laki/Perempuan (Pilih Salah Satu)</td>
            <td>+62812345678901</td>
            <td>Jln. Jalan Jauh</td>
            <td>no ket</td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>ID/Kode Jurusan</strong></td>
            <td>Jurusan</td>
        </tr>
        @foreach($majors as $major)
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
            <td><strong>{{ $major->id }}</strong></td>
            <td>{{ $major->major }}</td>
        </tr>
        @endforeach
    </tbody>
</table>