<?php

namespace App\Exports;

use App\Models\Borrow;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BorrowExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(string $major, string $month, string $year)
    {
        $this->major = $major;
        $this->month = $month;
        $this->year  = $year;
    }

    public function view() : View
    {
        $data['major'] = $this->major;
        $data['month'] = $this->month;
        $data['year']  = $this->year;

        return view('dashboard.report.xlsborrow', [
            'borrows' => Borrow::with('member')->with('book')->filter($data)->get()
        ]);
    }
}
