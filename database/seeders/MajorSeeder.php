<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Start Data Sample For Majors/Jurusan
         Major::create([
            'major'         => 'S1 Hukum Keluarga',
            'designation'   => 'HK'
        ]);
        Major::create([
            'major'         => 'S1 Ekonomi Syariah',
            'designation'   => 'ES'
        ]);
        Major::create([
            'major'         => 'S1 Komunikasi Dan Penyiaran Islam',
            'designation'   => 'KPI'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Agama Islam',
            'designation'   => 'PAI'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Bahasa Arab',
            'designation'   => 'PBA'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Guru Madrasah Ibtidaiyah',
            'designation'   => 'PGMI'
        ]);
        Major::create([
            'major'         => 'S1 Teknik Mesin',
            'designation'   => 'TM'
        ]);
        Major::create([
            'major'         => 'S1 Teknik Elektro',
            'designation'   => 'TE'
        ]);
        Major::create([
            'major'         => 'S1 Teknik Sipil',
            'designation'   => 'TS'
        ]);
        Major::create([
            'major'         => 'S1 Teknik Industri',
            'designation'   => 'TD'
        ]);
        Major::create([
            'major'         => 'S1 Teknik Informatika',
            'designation'   => 'TI'
        ]);
        Major::create([
            'major'         => 'S1 Sistem Informasi',
            'designation'   => 'SI'
        ]);
        Major::create([
            'major'         => 'D3 Manajemen Informatika',
            'designation'   => 'D3MI'
        ]);
        Major::create([
            'major'         => 'S1 Manajemen',
            'designation'   => 'Man'
        ]);
        Major::create([
            'major'         => 'S1 Akutansi',
            'designation'   => 'Akun'
        ]);
        Major::create([
            'major'         => 'S1 Ekonomi Islam',
            'designation'   => 'Ekis'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Sekolah Dasar',
            'designation'   => 'PGSD'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Bahasa Dan Sastra Indonesia',
            'designation'   => 'PBSI'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Bahasa Inggris',
            'designation'   => 'PBI'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Ilmu Pengetahuna Alam',
            'designation'   => 'PIPA'
        ]);
        Major::create([
            'major'         => 'S1 Pendidikan Matematika',
            'designation'   => 'PM'
        ]);
        Major::create([
            'major'         => 'S2 Hukum Keluarga',
            'designation'   => 'S2HK'
        ]);
        Major::create([
            'major'         => 'S2 Pendidikan Agama Islam',
            'designation'   => 'HK'
        ]);
        Major::create([
            'major'         => 'S1 Manajemen Pendidikan Islam',
            'designation'   => 'MPI'
        ]);
        //End Data Sample For Majors/Jurusan
    }
}
