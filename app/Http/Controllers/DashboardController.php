<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;

class DashboardController extends Controller
{
    /**
     * Show Dashboard
     * @return \Illuminate\View\View
     */

    public function index()
    {
        return view('dashboard.index', [
            'title'     => 'Dashboard',
            'active'    => 'home',
            'countBook' => Book::count(),
            'countMember' => Member::count(),
            'countBorrow' => Borrow::count(),
            'books'     => Book::withCount('borrow')->orderBy('borrow_count', 'DESC')->limit(10)->with('category')->get()
        ]);
    }
}
