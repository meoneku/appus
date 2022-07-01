<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Major;
use App\Models\Reversion;
use App\Models\Borrow;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExport;
use App\Exports\AllBookExport;
use App\Exports\AllReturnExport;
use App\Exports\ReturnExport;
use App\Exports\AllBorrowExport;
use App\Exports\BorrowExport;

class ReportController extends Controller
{
    public function viewBookReport()
    {
        $sfilter = "Semua";
        if (request('category')) {
            $sfilter = Category::all()->find(request('category'))->category;
        }
        return view('dashboard.report.book', [
            'title'         => 'Report Buku',
            'active'        => 'report buku',
            'books'         => Book::with('category')->latest()->filter(request(['search', 'category']))->paginate(20)->withQueryString(),
            'categories'    => Category::oldest()->get(),
            'sFilter'       => $sfilter
        ]);
    }

    public function exportXlsBook($category)
    {
        $fname = date('Ymd');
        $cat = Category::find($category);
        if(empty($category)){
            return Excel::download(new AllBookExport, 'Buku-Export-'.$fname.'.xlsx');
        } else {
            return Excel::download(new BookExport($category), 'Buku-Export-'.$cat->category.'-'.$fname.'.xlsx');
        }
    }

    public function printBook($category)
    {
        if(empty($category)){
            $books = Book::with('category')->get();
        } else {
            $books = Book::where('category_id', $category)->with('category')->get();
        }

        return view('dashboard.report.printbook',[
            'books' => $books
        ]);
    }

    public function viewReturnReport()
    {
        $sfilter = "Semua";

        if (request('major')) {
            $sfilter = Major::all()->find(request('major'))->major;
        }
        return view('dashboard.report.return', [
            'title'   => 'Report Pengembalian',
            'active'  => 'report kembali',
            'majors'  => Major::oldest()->get(),
            'backs'   => Reversion::latest()->with('member')->filter(request(['major', 'month', 'year']))->paginate(20)->withQueryString(),
            'sFilter' => $sfilter
        ]);
    }

    public function printReturn($major, $month, $year)
    {
        $data['major'] = '';
        $data['month'] = '';
        $data['year'] = '';
        if($major != 0) {
            $data['major'] = $major;
        }
        if($month != 0) {
            $data['month'] = $month;
        }
        if($year != 0) {
            $data['year'] = $year;
        }

        return view('dashboard.report.printreturn',[
            'reversions' => Reversion::with('member')->with('borrow')->filter($data)->get()
        ]);
    }

    public function exportXlsReturn($major, $month, $year)
    {
        $fname = date('Ymd');
        $data['year'] = '';
        $data['major'] = '';
        $data['month'] = '';

        $mjr = Major::find($major);

        if($year != 0) {
            $data['year'] = $year;
        }
        if($major != 0) {
            $data['major'] = $major;
        }
        if($month != 0) {
            $data['month'] = $month;
        }

        if($major == 0){
            return Excel::download(new AllReturnExport($data['year']), 'Return-Export-'.$fname.'.xlsx');
        } else {
            return Excel::download(new ReturnExport($data['major'], $data['month'], $data['year']), 'Return-Export-'.$mjr->major.'-'.$fname.'.xlsx');
        }
    }

    public function viewBorrowReport()
    {
        $sfilter = "Semua";

        if (request('major')) {
            $sfilter = Major::all()->find(request('major'))->major;
        }
        return view('dashboard.report.borrow', [
            'title'   => 'Report Peminjaman',
            'active'  => 'report peminjaman',
            'majors'  => Major::oldest()->get(),
            'borrows' => Borrow::latest()->with('member')->filter(request(['major', 'month', 'year']))->paginate(20)->withQueryString(),
            'sFilter' => $sfilter
        ]);
    }

    public function printBorrow($major, $month, $year)
    {
        $data['major'] = '';
        $data['month'] = '';
        $data['year'] = '';
        if($major != 0) {
            $data['major'] = $major;
        }
        if($month != 0) {
            $data['month'] = $month;
        }
        if($year != 0) {
            $data['year'] = $year;
        }

        return view('dashboard.report.printborrow',[
            'borrows' => Borrow::with('member')->with('book')->filter($data)->get()
        ]);
    }

    public function exportXlsBorrow($major, $month, $year)
    {
        $fname = date('Ymd');
        $data['year'] = '';
        $data['major'] = '';
        $data['month'] = '';

        $mjr = Major::find($major);

        if($year != 0) {
            $data['year'] = $year;
        }
        if($major != 0) {
            $data['major'] = $major;
        }
        if($month != 0) {
            $data['month'] = $month;
        }

        if($major == 0){
            return Excel::download(new AllBorrowExport($data['year']), 'Borrows-Export-'.$fname.'.xlsx');
        } else {
            return Excel::download(new BorrowExport($data['major'], $data['month'], $data['year']), 'Borrows-Export-'.$mjr->major.'-'.$fname.'.xlsx');
        }
    }
}