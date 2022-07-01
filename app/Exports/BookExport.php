<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(string $keyword)
    {
        $this->category_id = $keyword;
    }

    public function view() : View
    {
        return view('dashboard.report.xlsbook', [
            'books' => Book::where('category_id', $this->category_id)->with('category')->get()
        ]);
    }
}
