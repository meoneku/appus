<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Member;
use App\Models\Category;
use App\Models\Book;

class PrintController extends Controller
{
    public function viewMember()
    {
        $sfilter = "Semua";

        if (request('major')) {
            $sfilter = Major::all()->find(request('major'))->major;
        }
        return view('dashboard.print.member', [
            'title' => 'Cetak Kartu Anggota',
            'active' => 'kartu anggota',
            'members' => Member::with('major')->latest()->filter(request(['search', 'major', 'year']))->paginate(15)->withQueryString(),
            'majors' => Major::oldest()->get(),
            'sFilter' => $sfilter
        ]);
    }

    public function printAllCard($jurusan, $tahun, $cari)
    {
        $data['major'] = '';
        $data['year'] = '';
        $data['search'] = '';
        if($jurusan != 0) {
            $data['major'] = $jurusan;
        }
        if($tahun != 0) {
            $data['year'] = $tahun;
        }
        if($cari != 0) {
            $data['search'] = $cari;
        }

        return view('dashboard.print.printmember', [
            'members' => Member::with('major')->latest()->filter($data)->get(),
        ]);
    }

    public function printCard($anggota)
    {
        return view('dashboard.print.printmember', [
            'members' => Member::where('id', $anggota)->get(),
        ]);
    }

    public function viewBook()
    {
        $sfilter = "Semua";
        if (request('category')) {
            $sfilter = Category::all()->find(request('category'))->category;
        }
        return view('dashboard.print.book', [
            'title'         => 'Cetak Barcode Buku',
            'active'        => 'barcode',
            'books'         => Book::with('category')->latest()->filter(request(['search', 'category']))->paginate(15)->withQueryString(),
            'categories'    => Category::oldest()->get(),
            'sFilter'       => $sfilter
        ]);
    }

    public function printBook($buku)
    {
        $book = Book::find($buku);
        $total = collect([]);
        for ($i = 1; $i <= $book->stock; $i++) {
            $total->push($i);
        }
        return view('dashboard.print.printbook',[
            'book' => $book,
            'total'=> $total
        ]);
    }
}
