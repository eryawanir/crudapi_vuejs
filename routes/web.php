<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookTitleController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\User\UserRequestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => false, 'reset' => false, 'confirm' => false]);

Route::redirect('/', 'book-titles');
Route::redirect('/home', 'book-titles');

Route::resource('book-titles', BookTitleController::class);

Route::get('books/choose-book-title', [BookController::class, 'choose_title'])->name('books.choose-title');
Route::get('books/create/{bookTitle}', [BookController::class, 'create'])->name('books.create');
Route::resource('books', BookController::class, ['except' => ['create']]);

Route::get('requests/process/{request}', [RequestController::class, 'process'])->name('requests.process');
Route::post('requests/cancel/{request}', [RequestController::class, 'cancel'])->name('requests.cancel');
Route::resource('requests', RequestController::class);
Route::resource('myrequests', UserRequestController::class);

Route::name('peminjamans.')->prefix('peminjamans')->group(function () {
    Route::get('', [PeminjamanController::class, 'index'])->name('index');
    Route::post('', [PeminjamanController::class, 'store'])->name('store');
    Route::get('ambil/{peminjaman}', [PeminjamanController::class, 'ambil'])->name('ambil');
    Route::get('selesai/{peminjaman}/{buku}', [PeminjamanController::class, 'selesai'])->name('selesai');
});


Route::get('/buku/{nama}', function ($nama) {
    return "Tampilkan data buku bernama $nama";
});
