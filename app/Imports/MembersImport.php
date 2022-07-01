<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'member_name'   => $row['nama'],
            'member_number' => $row['nim'],
            'major_id'      => $row['jurusan'],
            'year'          => $row['angkatan'],
            'gender'        => $row['jenis_kelamin'],
            'phonenumber'   => $row['hp'],
            'addres'        => $row['alamat'],
            'desc'          => $row['ket']
        ]);
    }
}
