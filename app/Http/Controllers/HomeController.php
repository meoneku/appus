<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $sfilter = "Semua";
        if (request('category')) {
            $sfilter = Category::all()->find(request('category'))->category;
        }
        return view('index', [
            'books'         => Book::with('category')->latest()->filter(request(['search', 'category']))->paginate(10)->withQueryString(),
            'categories'    => Category::oldest()->get(),
            'sFilter'       => $sfilter
        ]);
    }

    public function show(Book $buku)
    {
        return view('modal', [
            'book'      => $buku
        ]);
    }
}
