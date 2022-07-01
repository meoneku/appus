<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BooksImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'title'         => $row['judul'],
            'isbn'          => $row['isbn'],
            'book_number'   => $row['nomor_buku'],
            'category_id'   => $row['kategori'],
            'publisher'     => $row['penerbit'],
            'author'        => $row['penulis'],
            'rack'          => $row['rak'],
            'public_year'   => $row['tahun_terbit'],
            'stock'         => $row['jumlah'],
            'desc'          => $row['deskripsi'],
            'status'        => $row['jumlah']
        ]);
    }
}
