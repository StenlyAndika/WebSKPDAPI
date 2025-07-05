<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardFoto;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardAgenda;
use App\Http\Controllers\DashboardBerita;
use App\Http\Controllers\DashboardProfil;
use App\Http\Controllers\DashboardWisata;
use App\Http\Controllers\DashboardDokumen;
use App\Http\Controllers\DashboardService;
use App\Http\Controllers\DashboardAnggaran;
use App\Http\Controllers\DashboardKepuasan;
use App\Http\Controllers\DashboardInformasi;
use App\Http\Controllers\DashboardPelayanan;
use App\Http\Controllers\DashboardPengaduan;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDomainDesa;
use App\Http\Controllers\DashboardDomainSKPD;
use App\Http\Controllers\DashboardPengumuman;
use App\Http\Controllers\DashboardPenghargaan;

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

Route::get('pengaduan/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('pengaduan/index', [HomeController::class, 'pengaduan'])->name('pengaduan');
Route::get('pengaduan/survey', [HomeController::class, 'survey'])->name('survey');
Route::get('pengaduan/ikm', [HomeController::class, 'ikm'])->name('ikm');

Route::get('/berita/read/{slug}', [HomeController::class, 'read'])->name('berita.read');

Route::get('/profil/sejarah', [HomeController::class, 'sejarah'])->name('sejarah');
Route::get('/profil/visimisi', [HomeController::class, 'visimisi'])->name('visimisi');
Route::get('/profil/struktur', [HomeController::class, 'struktur'])->name('struktur');

Route::get('/pelayanan/maklumat', [HomeController::class, 'maklumat'])->name('maklumat');
Route::get('/pelayanan/pakta', [HomeController::class, 'pakta'])->name('pakta');
Route::get('/pelayanan/index', [HomeController::class, 'pelayanan'])->name('pelayanan');
Route::get('/pelayanan/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::get('/galeri/foto', [HomeController::class, 'foto'])->name('foto');
Route::get('/galeri/penghargaan', [HomeController::class, 'penghargaan'])->name('penghargaan');

Route::get('/publikasi/anggaran', [HomeController::class, 'anggaran'])->name('anggaran');
Route::get('/publikasi/dokumen', [HomeController::class, 'dokumen'])->name('dokumen');
Route::get('/publikasi/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/tutorial', [DashboardController::class, 'tutorial'])->name('admin.tutorial');
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
    Route::get('/admin/pengumuman/{pengumuman}/edit', [DashboardPengumuman::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('/admin/pengumuman/{pengumuman}', [DashboardPengumuman::class, 'update'])->name('admin.pengumuman.update');
    Route::delete('/admin/pengumuman/{pengumuman}', [DashboardPengumuman::class, 'destroy'])->name('admin.pengumuman.destroy');
    Route::get('/admin/pengumuman/checkSlug/{judul}', [DashboardPengumuman::class, 'checkSlug']);

    Route::get('/admin/anggaran', [DashboardAnggaran::class, 'index'])->name('admin.anggaran.index');
    Route::get('/admin/anggaran/create', [DashboardAnggaran::class, 'create'])->name('admin.anggaran.create');
    Route::post('/admin/anggaran', [DashboardAnggaran::class, 'store'])->name('admin.anggaran.store');
    Route::get('/admin/anggaran/{anggaran}/edit', [DashboardAnggaran::class, 'edit'])->name('admin.anggaran.edit');
    Route::put('/admin/anggaran/{anggaran}', [DashboardAnggaran::class, 'update'])->name('admin.anggaran.update');
    Route::delete('/admin/anggaran/{anggaran}', [DashboardAnggaran::class, 'destroy'])->name('admin.anggaran.destroy');
    Route::get('/admin/anggaran/checkSlug/{keterangan}', [DashboardAnggaran::class, 'checkSlug']);

    Route::get('/admin/informasi', [DashboardInformasi::class, 'index'])->name('admin.informasi.index');
    Route::get('/admin/informasi/create', [DashboardInformasi::class, 'create'])->name('admin.informasi.create');
    Route::post('/admin/informasi', [DashboardInformasi::class, 'store'])->name('admin.informasi.store');
    Route::put('/admin/informasi/{informasi}', [DashboardInformasi::class, 'update'])->name('admin.informasi.update');
    Route::delete('/admin/informasi/{informasi}', [DashboardInformasi::class, 'destroy'])->name('admin.informasi.destroy');

    Route::get('/admin/dokumen', [DashboardDokumen::class, 'index'])->name('admin.dokumen.index');
    Route::get('/admin/dokumen/create', [DashboardDokumen::class, 'create'])->name('admin.dokumen.create');
    Route::post('/admin/dokumen', [DashboardDokumen::class, 'store'])->name('admin.dokumen.store');
    Route::get('/admin/dokumen/{dokumen}/edit', [DashboardDokumen::class, 'edit'])->name('admin.dokumen.edit');
    Route::put('/admin/dokumen/{dokumen}', [DashboardDokumen::class, 'update'])->name('admin.dokumen.update');
    Route::delete('/admin/dokumen/{dokumen}', [DashboardDokumen::class, 'destroy'])->name('admin.dokumen.destroy');
    Route::get('/admin/dokumen/checkSlug/{keterangan}', [DashboardDokumen::class, 'checkSlug']);

    Route::get('/admin/foto', [DashboardFoto::class, 'index'])->name('admin.foto.index');
    Route::get('/admin/foto/create', [DashboardFoto::class, 'create'])->name('admin.foto.create');
    Route::post('/admin/foto', [DashboardFoto::class, 'store'])->name('admin.foto.store');
    Route::get('/admin/foto/{foto}/edit', [DashboardFoto::class, 'edit'])->name('admin.foto.edit');
    Route::put('/admin/foto/{foto}', [DashboardFoto::class, 'update'])->name('admin.foto.update');
    Route::delete('/admin/foto/{foto}', [DashboardFoto::class, 'destroy'])->name('admin.foto.destroy');

    Route::get('/admin/penghargaan', [DashboardPenghargaan::class, 'index'])->name('admin.penghargaan.index');
    Route::get('/admin/penghargaan/create', [DashboardPenghargaan::class, 'create'])->name('admin.penghargaan.create');
    Route::post('/admin/penghargaan', [DashboardPenghargaan::class, 'store'])->name('admin.penghargaan.store');
    Route::get('/admin/penghargaan/{penghargaan}/edit', [DashboardPenghargaan::class, 'edit'])->name('admin.penghargaan.edit');
    Route::put('/admin/penghargaan/{penghargaan}', [DashboardPenghargaan::class, 'update'])->name('admin.penghargaan.update');
    Route::delete('/admin/penghargaan/{penghargaan}', [DashboardPenghargaan::class, 'destroy'])->name('admin.penghargaan.destroy');
    Route::get('/admin/penghargaan/checkSlug/{keterangan}', [DashboardPenghargaan::class, 'checkSlug']);

    Route::get('/admin/kepuasan', [DashboardKepuasan::class, 'index'])->name('admin.kepuasan.index');
    Route::get('/admin/kepuasan/create', [DashboardKepuasan::class, 'create'])->name('admin.kepuasan.create');
    Route::post('/admin/kepuasan', [DashboardKepuasan::class, 'store'])->name('admin.kepuasan.store');
    Route::get('/admin/kepuasan/{kepuasan}/edit', [DashboardKepuasan::class, 'edit'])->name('admin.kepuasan.edit');
    Route::put('/admin/kepuasan/{kepuasan}', [DashboardKepuasan::class, 'update'])->name('admin.kepuasan.update');
    Route::delete('/admin/kepuasan/{kepuasan}', [DashboardKepuasan::class, 'destroy'])->name('admin.kepuasan.destroy');

    Route::get('/admin/pelayanan', [DashboardPelayanan::class, 'index'])->name('admin.pelayanan.index');
    Route::get('/admin/pelayanan/create', [DashboardPelayanan::class, 'create'])->name('admin.pelayanan.create');
    Route::post('/admin/pelayanan', [DashboardPelayanan::class, 'store'])->name('admin.pelayanan.store');
    Route::get('/admin/pelayanan/{pelayanan}/show', [DashboardPelayanan::class, 'show'])->name('admin.pelayanan.show');
    Route::get('/admin/pelayanan/{pelayanan}/edit', [DashboardPelayanan::class, 'edit'])->name('admin.pelayanan.edit');
    Route::put('/admin/pelayanan/{pelayanan}', [DashboardPelayanan::class, 'update'])->name('admin.pelayanan.update');
    Route::delete('/admin/pelayanan/{pelayanan}', [DashboardPelayanan::class, 'destroy'])->name('admin.pelayanan.destroy');

    Route::get('/admin/agenda', [DashboardAgenda::class, 'index'])->name('admin.agenda.index');
    Route::get('/admin/agenda/create', [DashboardAgenda::class, 'create'])->name('admin.agenda.create');
    Route::post('/admin/agenda', [DashboardAgenda::class, 'store'])->name('admin.agenda.store');
    Route::get('/admin/agenda/{agenda}/edit', [DashboardAgenda::class, 'edit'])->name('admin.agenda.edit');
    Route::put('/admin/agenda/{agenda}', [DashboardAgenda::class, 'update'])->name('admin.agenda.update');
    Route::delete('/admin/agenda/{agenda}', [DashboardAgenda::class, 'destroy'])->name('admin.agenda.destroy');

    Route::get('/admin/profil', [DashboardProfil::class, 'index'])->name('admin.profil.index');
    Route::get('/admin/profil/create', [DashboardProfil::class, 'create'])->name('admin.profil.create');
    Route::post('/admin/profil', [DashboardProfil::class, 'store'])->name('admin.profil.store');
    Route::put('/admin/profil/{profil}', [DashboardProfil::class, 'update'])->name('admin.profil.update');
    Route::delete('/admin/profil/{profil}', [DashboardProfil::class, 'destroy'])->name('admin.profil.destroy');

    Route::get('/admin/user', [DashboardUser::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [DashboardUser::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [DashboardUser::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{user}/show', [DashboardUser::class, 'show'])->name('admin.user.show');
    Route::get('/admin/user/{user}/edit', [DashboardUser::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{user}', [DashboardUser::class, 'update'])->name('admin.user.update');
    Route::middleware(['root'])->group(function () {
        Route::put('/admin/user/{user}/updateroot', [DashboardUser::class, 'updateroot'])->name('admin.user.updateroot');
        Route::patch('/admin/user/{user}/set-admin', [DashboardUser::class, 'set_admin'])->name('admin.user.set_admin');
        Route::patch('/admin/user/{user}/set-root', [DashboardUser::class, 'set_root'])->name('admin.user.set_root');
    });
    Route::delete('/admin/user/{user}', [DashboardUser::class, 'destroy'])->name('admin.user.destroy');
});
