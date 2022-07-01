<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'title' => 'Data Petugas',
            'active' => 'petugas',
            'users' => User::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'title'     => 'Data Baru',
            'active'    => 'petugas'
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
        //return $request->file('picture')->store('images');

        $validate   = $request->validate([
            'name'      => 'required|max:128',
            'username'  => 'required|max:64',
            'password'  => 'required|max:64',
            'role'      => 'required',
            'picture'   => 'image|file|max:2048'
        ]);

        if($request->file('picture')){
            $validate['picture'] = $request->file('picture')->store('user-images');
        }

        $validate['password'] = Hash::make($request->password);
        
        User::create($validate);
        return redirect('user')->with('success', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'title'     => 'Ubah Data',
            'active'    => 'petugas',
            'user'      => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validate   = $request->validate([
            'name'      => 'required|max:128',
            'username'  => 'required|max:64',
            'password'  => 'required|max:64',
            'role'      => 'required'
        ]);

        $validate['password'] = Hash::make($request->password);
        
        User::where('id', $user->id)
                ->update($validate);
        return redirect('user')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('user')->with('success', 'Data Berhasil Di Hapus');
    }
}
