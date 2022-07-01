<?php

namespace App\Http\Controllers;

use App\Models\Reversion;
use App\Models\Major;
use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class ReversionController extends Controller
{

    public function index()
    {
        $sfilter = "Semua";

        if (request('major')) {
            $sfilter = Major::all()->find(request('major'))->major;
        }
        return view('dashboard.return.index', [
            'title'   => 'Data Pengembalian',
            'active'  => 'kembali',
            'majors'  => Major::oldest()->get(),
            'reversions' => Reversion::latest()->with('member')->filter(request(['search','major']))->paginate(20)->withQueryString(),
            'sFilter' => $sfilter
        ]);
    }

    public function add()
    {
        return view('dashboard.return.add',[
            'title'     => 'Data Pengembalian',
            'active'    => 'kembali'
        ]);
    }

    public function getBorrow(Request $request)
    {
        $search     = $request->search;

        if($search == ''){
            $borrows    = Borrow::orderby('borrow_date','asc')->with('major')->limit(10)->get();
        } else {
            $borrows    = Borrow::orderby('borrow_date','asc')->where('flag','YN')->whereHas('member', fn($q) => $q->where('member_name',  'like', '%'. $search .'%'))->with('major')->with('member')->limit(10)->get();
        }

        $response = array();
        foreach ($borrows as $borrow) {
            $response[] = array(
                "value" => $borrow->id,
                "label" => $borrow->borrow_number .'|'. $borrow->member->member_name .'|'. $borrow->major->major,
                "name"  => $borrow->member->member_name,
                "nim"   => $borrow->member->member_number,
                "major" => $borrow->major->major,
                "date"  => date('d-m-Y', strtotime($borrow->return_date))
            );
        }

        return response()->json($response);
    }

    public function review(Request $request)
    {
        $fine = 'Rp. 0';
        $late = 'N';
        $borrow = Borrow::find($request->borrow_id);

        $return_date = strtotime($borrow->return_date);
        $date_now    = strtotime(date('Y-m-d'));

        $perbook = 0;

        foreach($borrow->book as $book) {
            $perbook += 1;
        }

        if ($date_now > $return_date) {
            $time = $date_now - $return_date;
            $diff = $time / 60 / 60 / 24;
            $fines= $diff * env('FINE_DAY') * $perbook;
            $fine = "Rp. " . number_format($fines,0,',','.');
            $late = 'Y';
        }

        return view('dashboard.return.review',[
            'title'     => 'Data Pengembalian',
            'active'    => 'kembali',
            'fine'      => $fine,
            'late'      => $late,
            'borrow'    => $borrow
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'borrow_id'=> 'required',
            'late'     => 'required',
        ]);

        $validatedData['fine'] = 0;
        if ($request->fine) {
            $validatedData['fine'] = preg_replace('/[Rp. ]/','',$request->fine);
        }
        $validatedData['return_date'] = date('Y-m-d');

        $borrows = Borrow::find($request->borrow_id);

        foreach($borrows->book as $book) {
            $status = $book->status + 1;

            Book::where('id', $book->id)
            ->update(['status' => $status]);
        }

        $data = Reversion::create($validatedData);
        
        Borrow::where('id', $request->borrow_id)
        ->update(['flag' => 'YY']);



        return redirect('kembali')->with('success', 'Data Berhasil Di Simpan')->with('dataid', $data->id);
    }

    public function print(Reversion $kembali)
    {
        return view('dashboard.return.print',[
            'return' => $kembali
        ]);
    }

    public function destroy(Reversion $kembali)
    {
        Borrow::where('id', $kembali->borrow_id)
        ->update(['flag' => 'YN']);

        Reversion::destroy($kembali->id);
        return redirect('kembali')->with('delete', 'Pengembalian Berhasil Di Batalkan');
    }
}
