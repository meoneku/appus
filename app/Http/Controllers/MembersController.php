<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Major;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Imports\MembersImport;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sfilter = "Semua";

        if (request('major')) {
            $sfilter = Major::all()->find(request('major'))->major;
        }
        return view('dashboard.member.index', [
            'title' => 'Data Anggota',
            'active' => 'anggota',
            'members' => Member::with('major')->latest()->filter(request(['search', 'major']))->paginate(12)->withQueryString(),
            'majors' => Major::oldest()->get(),
            'sFilter' => $sfilter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.member.create', [
            'title'  => 'Data Anggota',
            'active' => 'anggota',
            'majors' => Major::oldest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validateData   = $request->validate([
            'member_name'   => 'required|max:128',
            'member_number' => 'required|max:20',
            'major_id'      => 'required',
            'year'          => 'required|max:4',
            'gender'        => 'required|max:10',
            'phonenumber'   => 'required|max:20',
            'addres'        => 'required',
            'desc'          => 'required',
            'photo'         => 'image|file|max:2048'
        ]);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('member-photo');
        }

        Member::create($validateData);
        return redirect('anggota')->with('success', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $anggotum)
    {
        return view('dashboard.member.detailsModal', [
            'title'     => 'Ubah Data',
            'active'    => 'anggota',
            'member'    => $anggotum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $anggotum)
    {
        return view('dashboard.member.edit', [
            'title'     => 'Ubah Data',
            'active'    => 'anggota',
            'member'    => $anggotum,
            'majors'    => Major::oldest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $anggotum)
    {
        $validateData   = $request->validate([
            'member_name'   => 'required|max:128',
            'member_number' => 'required|max:20',
            'major_id'      => 'required',
            'year'          => 'required|max:4',
            'gender'        => 'required|max:10',
            'phonenumber'   => 'required|max:20',
            'addres'        => 'required',
            'desc'          => 'required',
            'photo'         => 'image|file|max:2048'
        ]);

        if ($request->file('photo')) {
            $validateData['photo'] = $request->file('photo')->store('member-photo');
        }

        Member::where('id', $anggotum->id)
            ->update($validateData);

        return redirect('anggota')->with('success', 'Data Berhasil Di Hapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $anggotum)
    {
        Member::destroy($anggotum->id);
        return redirect('anggota')->with('success', 'Data Berhasil Di Hapus');
    }
}
