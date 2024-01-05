<?php

use App\Http\Controllers\BookTitleController;
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

Route::get('/', function () {
    return redirect('book-titles');
});
Route::get('/home', function () {
    return redirect('book-titles');
});

Auth::routes(['verify' => false, 'reset' => false, 'confirm' => false]);

Route::resource('book-titles', BookTitleController::class);
