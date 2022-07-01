<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.major.index', [
            'title' => 'Data Jurusan',
            'active' => 'jurusan',
            'majors' => Major::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.major.create', [
            'title'     => 'Data Jurusan',
            'active' => 'jurusan'
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
        $validateData = $request->validate([
            'major'     => 'required|max:64',
            'designation'=> 'required|max:10'
        ]);
        Major::create($validateData);
        return redirect('jurusan')->with('success', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function edit(Major $jurusan)
    {
        return view('dashboard.major.edit', [
            'title'     => 'Ubah Data',
            'active'    => 'jurusan',
            'major'      => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Major $jurusan)
    {
        $validateData = $request->validate([
            'major'     => 'required|max:64',
            'designation'=> 'required|max:10'
        ]);
        Major::where('id', $jurusan->id)
                ->update($validateData);
        return redirect('jurusan')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Major  $major
     * @return \Illuminate\Http\Response
     */
    public function destroy(Major $jurusan)
    {
        Major::destroy($jurusan->id);
        return redirect('jurusan')->with('success', 'Data Berhasil Di Hapus');
    }
}
