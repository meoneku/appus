<?php

namespace App\Exports;

use App\Models\Major;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\SheetMajorReturn;

class AllReturnExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $year)
    {
        $this->year  = $year;
    }

    public function sheets() : array
    {
        $sheets = [];

        foreach (Major::all() as $major) {
            $sheets[] = new SheetMajorReturn($major->id, $this->year);
        }

        return $sheets;
    }
}
