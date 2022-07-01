<?php

namespace App\Exports;

use App\Models\Major;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberImportTemplate implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        return view('dashboard.member.imptemplate', [
            'majors' => Major::all()
        ]);
    }
}
