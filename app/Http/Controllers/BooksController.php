<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sfilter = "Semua";
        if (request('category')) {
            $sfilter = Category::all()->find(request('category'))->category;
        }
        return view('dashboard.book.index', [
            'title'         => 'Data Buku',
            'active'        => 'buku',
            'books'         => Book::with('category')->latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString(),
            'categories'    => Category::oldest()->get(),
            'sFilter'       => $sfilter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.book.create', [
            'title'     => 'Data Buku',
            'active'    => 'buku',
            'categories'=> Category::oldest()->get(),
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
        $validateData   = $request->validate([
            'title'         => 'required|max:255',
            'isbn'          => 'required|max:20',
            'book_number'   => 'required|max:20',
            'category_id'   => 'required',
            'publisher'     => 'required|max:200',
            'author'        => 'required|max:128',
            'rack'          => 'required|max:10',
            'public_year'   => 'required|max:4',
            'stock'         => 'required|max:5',
            'desc'          => 'required',
            'cover'         => 'image|file|max:2048'
        ]);

        $validateData['status'] = $request->stock;

        if ($request->file('cover')) {
            $validateData['cover'] = $request->file('cover')->store('book-covers');
        }

        Book::create($validateData);
        return redirect('buku')->with('success', 'Data Berhasil Di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $buku)
    {
        return view('dashboard.book.detailsModal', [
            'title'     => 'Ubah Data',
            'active'    => 'buku',
            'book'     => $buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $buku)
    {
        return view('dashboard.book.edit', [
            'title'     => 'Ubah Data',
            'active'    => 'buku',
            'book'      => $buku,
            'categories'    => Category::oldest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $buku)
    {
        $validateData   = $request->validate([
            'title'         => 'required|max:255',
            'isbn'          => 'required|max:20',
            'book_number'   => 'required|max:20',
            'category_id'   => 'required',
            'publisher'     => 'required|max:200',
            'author'        => 'required|max:128',
            'rack'          => 'required|max:10',
            'public_year'   => 'required|max:4',
            'stock'         => 'required|max:5',
            'desc'          => 'required',
            'cover'         => 'image|file|max:2048'
        ]);

        $validateData['status'] = $request->stock;

        if ($request->file('cover')) {
            $validateData['cover'] = $request->file('cover')->store('book-covers');
        }

        Book::where('id', $buku->id)
            ->update($validateData);

        return redirect('buku')->with('success', 'Data Berhasil Di Hapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $buku)
    {
        Book::destroy($buku->id);
        return redirect('buku')->with('success', 'Data Berhasil Di Hapus');
    }
}
