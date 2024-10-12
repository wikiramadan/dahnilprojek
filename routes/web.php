<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ContenController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserrController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\PDFController;




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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [ContenController::class, 'index']);
Route::resource('siswa', SiswaController::class);
Route::resource('buku', BukuController::class);
Route::resource('peminjam', PeminjamController::class);
Route::resource('foto', FotoController::class);
Route::resource('user', UserrController::class);

Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.proses')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [ContenController::class, 'index'])->name('home.index')->middleware('auth');

Route::get('/changepassword',[UserController::class,'showChangePasswordForm'])->middleware('auth');
Route::post('/changepassword',[UserController::class,'changepassword'])->name('changepassword')->middleware('auth');