<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Start Data Sample For Categories
        Category::create([
            'category'      => 'Novel',
            'abbreviation'  => 'NVL',
        ]);
        Category::create([
            'category'      => 'Cergam',
            'abbreviation'  => 'CGM',
        ]);
        Category::create([
            'category'      => 'Komik',
            'abbreviation'  => 'KOM',
        ]);
        Category::create([
            'category'      => 'Ensiklopedi',
            'abbreviation'  => 'ENSKL',
        ]);
        Category::create([
            'category'      => 'Nomik',
            'abbreviation'  => 'NOM',
        ]);
        Category::create([
            'category'      => 'Antologi',
            'abbreviation'  => 'ANTLG',
        ]);
        Category::create([
            'category'      => 'Dongeng',
            'abbreviation'  => 'DGNG',
        ]);
        Category::create([
            'category'      => 'Biografi',
            'abbreviation'  => 'BIO',
        ]);
        Category::create([
            'category'      => 'Noveli',
            'abbreviation'  => 'NVLI',
        ]);
        Category::create([
            'category'      => 'Catatan Harian',
            'abbreviation'  => 'CTHRI',
        ]);
        Category::create([
            'category'      => 'Fotografi',
            'abbreviation'  => 'FTOGI',
        ]);
        Category::create([
            'category'      => 'Karya Ilmiah',
            'abbreviation'  => 'KRYIL',
        ]);
        Category::create([
            'category'      => 'Tafsir',
            'abbreviation'  => 'TFS',
        ]);
        Category::create([
            'category'      => 'Kamus',
            'abbreviation'  => 'KMS',
        ]);
        Category::create([
            'category'      => 'Panduan (how to)',
            'abbreviation'  => 'PNDU',
        ]);
        Category::create([
            'category'      => 'Atlas',
            'abbreviation'  => 'ATLS',
        ]);
        Category::create([
            'category'      => 'Buku Ilmiah',
            'abbreviation'  => 'BILM',
        ]);
        Category::create([
            'category'      => 'Teks',
            'abbreviation'  => 'TKS',
        ]);
        Category::create([
            'category'      => 'Majalah',
            'abbreviation'  => 'MJLH',
        ]);
        Category::create([
            'category'      => 'Buku Digital',
            'abbreviation'  => 'EBOOK',
        ]);
        //End Data Sample For Categories
    }
}
