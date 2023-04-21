<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardBerita;
use App\Http\Controllers\DashboardAnggaran;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPengumuman;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::post('/kontak', [HomeController::class, 'kontak'])->name('kontak');

Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/read/{slug}', [HomeController::class, 'read'])->name('berita.read');

Route::get('/profil/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
Route::get('/profil/pendidikan', [HomeController::class, 'pendidikan'])->name('pendidikan');
Route::get('/profil/kesehatan', [HomeController::class, 'kesehatan'])->name('kesehatan');
Route::get('/profil/keuangan', [HomeController::class, 'keuangan'])->name('keuangan');
Route::get('/profil/perbelanjaan', [HomeController::class, 'perbelanjaan'])->name('perbelanjaan');
Route::get('/profil/hotel', [HomeController::class, 'hotel'])->name('hotel');
Route::get('/profil/wisata', [HomeController::class, 'wisata'])->name('wisata');

Route::get('/galeri/foto', [HomeController::class, 'foto'])->name('foto');
Route::get('/galeri/video', [HomeController::class, 'video'])->name('video');
Route::get('/galeri/penghargaan', [HomeController::class, 'penghargaan'])->name('penghargaan');

Route::get('/publikasi/anggaran', [HomeController::class, 'anggaran'])->name('anggaran');
Route::get('/publikasi/dokumen', [HomeController::class, 'dokumen'])->name('dokumen');
Route::get('/publikasi/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');

Route::get('/situs/skpd', [HomeController::class, 'skpd'])->name('skpd');
Route::get('/situs/desa', [HomeController::class, 'desa'])->name('desa');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin', 'root'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::delete('/dashboard{kontak}', [DashboardController::class, 'destroy'])->name('admin.dashboard.destroy');

    Route::get('/admin/berita', [DashboardBerita::class, 'index'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [DashboardBerita::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [DashboardBerita::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{berita}', [DashboardBerita::class, 'show'])->name('admin.berita.show');
    Route::get('/admin/berita/{berita}/edit', [DashboardBerita::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{berita}', [DashboardBerita::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{berita}', [DashboardBerita::class, 'destroy'])->name('admin.berita.destroy');
    Route::get('/admin/berita/checkSlug/{judul}', [DashboardBerita::class, 'checkSlug']);

    Route::get('/admin/pengumuman', [DashboardPengumuman::class, 'index'])->name('admin.pengumuman.index');
    Route::get('/admin/pengumuman/create', [DashboardPengumuman::class, 'create'])->name('admin.pengumuman.create');
    Route::post('/admin/pengumuman', [DashboardPengumuman::class, 'store'])->name('admin.pengumuman.store');
    Route::get('/admin/pengumuman/{pengumuman}', [DashboardPengumuman::class, 'show'])->name('admin.pengumuman.show');
    Route::get('/admin/pengumuman/{pengumuman}/edit', [DashboardPengumuman::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('/admin/pengumuman/{pengumuman}', [DashboardPengumuman::class, 'update'])->name('admin.pengumuman.update');
    Route::delete('/admin/pengumuman/{pengumuman}', [DashboardPengumuman::class, 'destroy'])->name('admin.pengumuman.destroy');
    Route::get('/admin/pengumuman/checkSlug/{judul}', [DashboardPengumuman::class, 'checkSlug']);

    Route::get('/admin/anggaran', [DashboardAnggaran::class, 'index'])->name('admin.anggaran.index');
    Route::get('/admin/anggaran/create', [DashboardAnggaran::class, 'create'])->name('admin.anggaran.create');
    Route::post('/admin/anggaran', [DashboardAnggaran::class, 'store'])->name('admin.anggaran.store');
    Route::get('/admin/anggaran/{anggaran}', [DashboardAnggaran::class, 'show'])->name('admin.anggaran.show');
    Route::get('/admin/anggaran/{anggaran}/edit', [DashboardAnggaran::class, 'edit'])->name('admin.anggaran.edit');
    Route::put('/admin/anggaran/{anggaran}', [DashboardAnggaran::class, 'update'])->name('admin.anggaran.update');
    Route::delete('/admin/anggaran/{anggaran}', [DashboardAnggaran::class, 'destroy'])->name('admin.anggaran.destroy');
    Route::get('/admin/anggaran/checkSlug/{keterangan}', [DashboardAnggaran::class, 'checkSlug']);
});