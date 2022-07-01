<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Major;
use App\Models\Member;
use App\Models\Book;
// use App\Models\Reversion;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $sfilter = "Semua";

        if (request('major')) {
            $sfilter = Major::all()->find(request('major'))->major;
        }
        return view('dashboard.borrow.index', [
            'title'   => 'Data Peminjaman',
            'active'  => 'pinjam',
            //'members' => Member::with('major')->latest()->filter(request(['search', 'major']))->paginate(12)->withQueryString(),
            'majors'  => Major::oldest()->get(),
            'borrows' => Borrow::latest()->where('flag', 'YN')->with('member')->with('major')->filter(request(['search','major']))->paginate(20)->withQueryString(),
            'sFilter' => $sfilter
        ]);
        //dd(Borrow::latest()->with('member')->with('major')->limit(10)->get());
    }

    public function getBook(Request $request)
    {
        $search     = $request->search;

        if($search == ''){
            $books    = Book::orderby('title','asc')->with('category')->limit(10)->get();
        } else {
            $books    = Book::orderby('title','asc')->where('title', 'like', '%'. $search .'%')->with('category')->limit(10)->get();
        }

        $response = array();
        foreach ($books as $book) {
            $response[] = array(
                "value" => $book->id,
                "label" => $book->isbn .'|'. $book->title .'|'. $book->category->category,
            );
        }

        return response()->json($response);
    }

    public function getMember(Request $request)
    {
        $search     = $request->search;

        if($search == ''){
            $members    = Member::orderby('member_name','asc')->with('major')->limit(10)->get();
        } else {
            $members    = Member::orderby('member_name','asc')->where('member_name', 'like', '%'. $search .'%')->with('major')->limit(10)->get();
        }

        $response = array();
        foreach ($members as $member) {
            $response[] = array(
                "value" => $member->id,
                "label" => $member->member_number .'|'. $member->member_name .'|'. $member->major->major,
                "name"  => $member->member_name,
                "nim"   => $member->member_number,
                "major" => $member->major->major
            );
        }

        return response()->json($response);
    }

    public function add()
    {
        return view('dashboard.borrow.borrow',[
            'title'     => 'Peminjaman Buku',
            'active'    => 'pinjam'
        ]);
    }

    public function addBook(Request $request, Borrow $pinjam)
    {
        $book = Book::where('id', $request->book_id)->first();
        if ($book->status == 0) {
            return redirect('pinjam/'.$pinjam->id.'/edit')->with('warning', 'Buku Yang Di Pilih Sudah Tidak Memiliki Persediaan');
        }

        $status = $book->status - 1;

        $borrow = Borrow::find($pinjam->id);
        $borrow->book()->attach($request->book_id);

        Book::where('id', $request->book_id)
        ->update(['status' => $status]);

        return redirect('pinjam/'.$pinjam->id.'/edit')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function deleteBook(Request $request, Book $buku)
    {
        $borrow = Borrow::find($request->borrow_id);
        $borrow->book()->detach($buku->id);
        return redirect('pinjam/'.$request->borrow_id.'/edit')->with('success', 'Data Berhasil Di Hapus');
    }

    public function delete(Borrow $pinjam)
    {
        $borrow = Borrow::find($pinjam->id);
        $borrow->book()->detach();
        $borrow->destroy($pinjam->id);
        return redirect('pinjam')->with('success', 'Data Berhasil Di Hapus');
    }

    public function addMember(Request $request)
    {
        $validatedData = $request->validate([
            'member_id'     => 'required',
            'return_date'   => 'required'
        ]);

        $validatedData['borrow_date'] = date('Y-m-d');

        $validatedData['borrow_number'] = $this->invNumber();

        $data = Borrow::create($validatedData);
        return redirect('pinjam/'.$data->id.'/edit')->with('success', 'Data Berhasil Di Simpan');
    }

    public function edit(Borrow $pinjam)
    {
        return view('dashboard.borrow.edit',[
            'title'     => 'Peminjaman Buku',
            'active'    => 'pinjam',
            'borrow'    => $pinjam,
        ]);
    }

    public function print(Borrow $pinjam)
    {
        return view('dashboard.borrow.print',[
            'borrow' => $pinjam
        ]);
    }

    public function invNumber()
    {
        $begin = env('APP_INVOICE');
        $roma = array("", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
        $borrow = Borrow::latest()->whereYear('created_at', date('Y'))->first();
        $number = 1;
        if($borrow) {
            $lastNumber= substr($borrow->borrow_number, 0, 4);
            $intNumber =  preg_replace('/[0]/','',$lastNumber);
            $autonumber = sprintf("%04s", abs($intNumber + 1)) . '/' . $begin . '/' . $roma[date('n')] . '/' . date('Y');
        } else {
            $autonumber = sprintf("%04s", $number) . '/' . $begin . '/' . $roma[date('n')] . '/' . date('Y');
        }

        return $autonumber;
    }
}
