<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'home']);

Route::post('/kontak', [HomeController::class, 'kontak']);

Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/read/{slug}', [HomeController::class, 'read']);

Route::get('/profil/sejarah', [HomeController::class, 'sejarah']);
Route::get('/profil/pendidikan', [HomeController::class, 'pendidikan']);
Route::get('/profil/kesehatan', [HomeController::class, 'kesehatan']);
Route::get('/profil/keuangan', [HomeController::class, 'keuangan']);
Route::get('/profil/perbelanjaan', [HomeController::class, 'perbelanjaan']);
Route::get('/profil/hotel', [HomeController::class, 'hotel']);
Route::get('/profil/wisata', [HomeController::class, 'wisata']);

Route::get('/galeri/foto', [HomeController::class, 'foto']);
Route::get('/galeri/video', [HomeController::class, 'video']);
Route::get('/galeri/penghargaan', [HomeController::class, 'penghargaan']);

Route::get('/publikasi/anggaran', [HomeController::class, 'anggaran']);
Route::get('/publikasi/dokumen', [HomeController::class, 'dokumen']);
Route::get('/publikasi/pengumuman', [HomeController::class, 'pengumuman']);

Route::get('/situs/skpd', [HomeController::class, 'skpd']);
Route::get('/situs/desa', [HomeController::class, 'desa']);
