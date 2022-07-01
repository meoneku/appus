<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MembersController;
use App\http\Controllers\ImportController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReversionController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Guest Page or Main Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/detail/{buku}', [HomeController::class, 'show']);


//Authorization
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth']);
});
Route::get('/logout', [LoginController::class, 'logout']);

//Admin Page
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resources(['user' => UserController::class,]);
    Route::resources(['jurusan' => MajorsController::class,]);
    Route::resources(['kategori' => CategoriesController::class,]);
    Route::resources(['anggota' => MembersController::class,]);
    Route::resources(['buku' => BooksController::class,]);
    Route::get('/import/anggota', [ImportController::class, 'anggota'])->name('ImportMembers');
    Route::post('/import/anggota', [ImportController::class, 'AnggotaImportView']);
    Route::post('/import/importanggota', [ImportController::class, 'ImportAnggota']);
    Route::get('/import/buku', [ImportController::class, 'buku'])->name('ImportBooks');
    Route::post('/import/buku', [ImportController::class, 'BukuImportView']);
    Route::post('/import/importbuku', [ImportController::class, 'ImportBuku']);
    Route::get('/import/templateanggota', [ImportController::class, 'DownloadTemplateMember']);
    Route::get('/import/templatebuku', [ImportController::class, 'DownloadTemplateBook']);
    Route::get('/pinjam', [BorrowController::class, 'index'])->name('BorrowHome');
    Route::get('/pinjam/add', [BorrowController::class, 'add']);
    Route::post('/pinjam/getanggota', [BorrowController::class, 'getMember']);
    Route::post('/pinjam/getbuku', [BorrowController::class, 'getBook']);
    Route::post('/pinjam', [BorrowController::class, 'addMember']);
    Route::get('/pinjam/{pinjam}/edit', [BorrowController::class, 'edit']);
    Route::post('/pinjam/buku/{pinjam}', [BorrowController::class, 'addBook']);
    Route::delete('/pinjam/buku/{buku}', [BorrowController::class, 'deleteBook']);
    Route::delete('/pinjam/{pinjam}', [BorrowController::class, 'delete']);
    Route::get('/pinjam/cetak/{pinjam}', [BorrowController::class, 'print']);
    Route::get('/kembali', [ReversionController::class, 'index']);
    Route::get('/kembali/tambah', [ReversionController::class, 'add']);
    Route::post('/kembali/getpinjam', [ReversionController::class, 'getBorrow']);
    Route::post('/kembali/review', [ReversionController::class, 'review']);
    Route::post('/kembali', [ReversionController::class, 'store']);
    Route::get('/kembali/cetak/{kembali}', [ReversionController::class, 'print']);
    Route::delete('/kembali/{kembali}', [ReversionController::class, 'destroy']);
    Route::get('/rbuku', [ReportController::class, 'viewBookReport']);
    Route::post('/rbuku/{category}', [ReportController::class, 'exportXlsBook']);
    Route::get('/rbuku/{category}', [ReportController::class, 'printBook']);
    Route::get('/rkembali', [ReportController::class, 'viewReturnReport']);
    Route::get('/rkembali/{major}/{month}/{year}', [ReportController::class, 'printReturn']);
    Route::post('/rkembali/{major}/{month}/{year}', [ReportController::class, 'exportXlsReturn']);
    Route::get('/rpinjam', [ReportController::class, 'viewBorrowReport']);
    Route::get('/rpinjam/{major}/{month}/{year}', [ReportController::class, 'printBorrow']);
    Route::post('/rpinjam/{major}/{month}/{year}', [ReportController::class, 'exportXlsBorrow']);
    Route::get('/panggota', [PrintController::class, 'viewMember']);
    Route::get('/panggota/cetak/{jurusan}/{tahun}/{cari}', [PrintController::class, 'printAllCard']);
    Route::get('/panggota/cetak/{anggota}', [PrintController::class, 'printCard']);
    Route::get('/pbuku', [PrintController::class, 'viewBook']);
    Route::get('/pbuku/cetak/{buku}', [PrintController::class, 'printBook']);
    Route::get('/akun', [AccountController::class, 'index']);
    Route::post('/akun', [AccountController::class, 'updatePassword']);
});
