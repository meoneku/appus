<?php

namespace App\Exports\Sheets;

use App\Models\Borrow;
use App\Models\Major;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class SheetMajorBorrow implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $major, string $year)
    {
        $this->major = $major;
        $this->year  = $year;
    }

    public function view() : View
    {
        $data['major'] = $this->major;
        $data['year']  = $this->year;

        return view('dashboard.report.xlsborrow', [
            'borrows' => Borrow::with('member')->with('book')->filter($data)->get()
        ]);
    }

    public function title() : string
    {
        $major = Major::find($this->major);
        return $major->designation;
    }

}
