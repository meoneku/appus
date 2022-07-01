<?php

namespace App\Exports;

use App\Models\Reversion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReturnExport implements FromView
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

        return view('dashboard.report.xlsreturn', [
            'reversions' => Reversion::with('member')->with('borrow')->filter($data)->get()
        ]);
    }
}
