<?php

namespace App\Http\Controllers;

use App\Imports\BooksImport;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;
use App\Models\Category;
use App\Models\Major;
use App\Exports\MemberImportTemplate;
use App\Exports\BookImportTemplate;
use Illuminate\Support\Collection;

class ImportController extends Controller
{
    public function anggota()
    {
        return view('dashboard.member.import', [
            'title'     => 'Import Data',
            'active'    => 'anggota'
        ]);
    }

    public function AnggotaImportView(Request $request)
    {
        $file = $request->file('file')->store('import-data');
        $rows = Excel::toArray(new MembersImport, $file);
        $majors = collect(Major::all());
        return view('dashboard.member.importView', [
            'title'     => 'Import Data',
            'active'    => 'anggota',
            'rows'      => $rows[0],
            'CountRows' => count($rows[0]),
            'majors'    => $majors,
            'file'      => $file,
        ]);
    }

    public function ImportAnggota(Request $request)
    {
        $file =  'uploads/'. $request->file;
        Excel::import(new MembersImport, $file);
        return redirect('anggota')->with('success', 'Data Berhasil Di Import');
    }

    public function buku()
    {
        return view('dashboard.book.import', [
            'title'     => 'Import Data',
            'active'    => 'buku'
        ]);
    }

    public function BukuImportView(Request $request)
    {
        $file = $request->file('file')->store('import-data');
        $rows = Excel::toArray(new MembersImport, $file);
        $categories = collect(Category::all());
        return view('dashboard.book.importView', [
            'title'     => 'Import Data',
            'active'    => 'buku',
            'rows'      => $rows[0],
            'CountRows' => count($rows[0]),
            'categories'=> $categories,
            'file'      => $file,
        ]);
    }

    public function ImportBuku(Request $request)
    {
        $file =  'uploads/'. $request->file;
        Excel::import(new BooksImport, $file);
        return redirect('buku')->with('success', 'Data Berhasil Di Import');
    }

    public function DownloadTemplateMember()
    {
        return Excel::download(new MemberImportTemplate, 'Template-import-Anggota.xlsx');
    }

    public function DownloadTemplateBook()
    {
        return Excel::download(new BookImportTemplate, 'Template-import-Buku.xlsx');
    }
}
