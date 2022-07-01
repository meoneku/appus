<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index',[
            'title' => 'Data Kategori',
            'active' => 'kategori',
            'categories' => Category::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create',[
            'title' => 'Data Kategori',
            'active' => 'kategori'
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
            'category'    => 'required|max:128',
            'abbreviation'=> 'required|max:5'
        ]);
        Category::create($validateData);
        return redirect('kategori')->with('success', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $kategori)
    {
        return view('dashboard.category.edit', [
            'title'     => 'Ubah Data',
            'active'    => 'kategori',
            'category'  => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $kategori)
    {
        $validateData = $request->validate([
            'category'    => 'required|max:128',
            'abbreviation'=> 'required|max:5'
        ]);

        Category::where('id', $kategori->id)
                ->update($validateData);
        return redirect('kategori')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $kategori)
    {
        Category::destroy($kategori->id);
        return redirect('kategori')->with('success', 'Data Berhasil Di Hapus');
    }
}
