<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exports\Sheets\SheetCategory;

class AllBookExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets() : array
    {
        $sheets = [];

        foreach (Category::latest()->get() as $cat) {
            $sheets[] = new SheetCategory($cat->id);
        }

        return $sheets;
    }
}
