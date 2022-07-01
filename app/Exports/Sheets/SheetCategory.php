<?php

namespace App\Exports\Sheets;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class SheetCategory implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $category)
    {
        $this->category_id = $category;
    }

    public function view() : View
    {
        return view('dashboard.report.xlsbook', [
            'books' => Book::where('category_id', $this->category_id)->with('category')->get()
        ]);
    }

    public function title() : string
    {
        $cat = Category::find($this->category_id);
        return $cat->category;
    }

}
