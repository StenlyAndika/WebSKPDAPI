<?php

namespace App\Http\Controllers;

use App\Models\AdminDesa;
use App\Models\AdminFoto;
use App\Models\AdminSkpd;
use App\Models\AdminUser;
use App\Models\AdminBerita;
use App\Models\AdminKontak;
use App\Models\AdminDokumen;
use Illuminate\Http\Request;
use App\Models\AdminAnggaran;
use App\Models\AdminKepuasan;
use App\Models\AdminPengumuman;
use App\Models\DashboardProfil;
use App\Models\AdminPenghargaan;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function home() {
        return view('home.index', [
            'title' => 'Website Resmi Pemerintah Kota Sungai Penuh'
        ]);
    }

    public function kontak(Request $request) {
        $rules = [
            'nama' => 'required',
            'wa' => 'required',
            'email' => 'required|email:dns',
            'pesan' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        AdminKontak::create($validatedData);
        
        return redirect('/')->with('success', 'Pesan anda berhasil disubmit!');
    }

    public function berita() {
        return view('home.berita', [
            'title' => 'Berita Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::allberita(5)
        ]);
    }

    public function read($slug) {
        return view('home.read', [
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::allberita(5),
            'singleberita' => AdminBerita::singleberita($slug),
            'title' => AdminBerita::singleberita($slug)->judul
        ]);
    }
    
    public function sejarah() {
        return view('home.profil.sejarah', [
            'title' => 'Sejarah Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function pendidikan() {
        return view('home.profil.pendidikan', [
            'title' => 'Pusat Pendidikan Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'pendidikan' => DashboardProfil::allpendidikan(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function kesehatan() {
        return view('home.profil.kesehatan', [
            'title' => 'Pusat Kesehatan Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'kesehatan' => DashboardProfil::allkesehatan(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function keuangan() {
        return view('home.profil.keuangan', [
            'title' => 'Pusat Keuangan Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'keuangan' => DashboardProfil::allkeuangan(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function perbelanjaan() {
        return view('home.profil.perbelanjaan', [
            'title' => 'Pusat Perbelanjaan Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'perbelanjaan' => DashboardProfil::allperbelanjaan(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function hotel() {
        return view('home.profil.hotel', [
            'title' => 'Pusat Hotel Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'hotel' => DashboardProfil::allhotel(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function wisata() {
        return view('home.profil.wisata', [
            'title' => 'Wisata Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function foto() {
        return view('home.galeri.foto', [
            'title' => 'Galeri Foto Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'foto' => AdminFoto::allfoto()
        ]);
    }

    public function video() {
        return view('home.galeri.video', [
            'title' => 'Galeri Video Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3)
        ]);
    }

    public function penghargaan() {
        return view('home.galeri.penghargaan', [
            'title' => 'Penghargaan Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'penghargaan' => AdminPenghargaan::all()
        ]);
    }

    public function anggaran() {
        return view('home.publikasi.anggaran', [
            'title' => 'Transparansi Anggaran Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'anggaran' => AdminAnggaran::allanggaran()
        ]);
    }

    public function dokumen() {
        return view('home.publikasi.dokumen', [
            'title' => 'Publikasi Dokumen Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'dokumen' => AdminDokumen::alldokumen()
        ]);
    }

    public function pengumuman() {
        return view('home.publikasi.pengumuman', [
            'title' => 'Pengumuman Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'pengumuman' => AdminPengumuman::all()
        ]);
    }

    public function skpd() {
        return view('home.situs.skpd', [
            'title' => 'Website SKPD Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'skpd' => AdminSkpd::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function desa() {
        return view('home.situs.desa', [
            'title' => 'Website Desa Kota Sungai Penuh',
            'kepuasan' => AdminKepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => AdminBerita::beritalimit(3),
            'desa' => AdminDesa::orderBy('nama', 'ASC')->get()
        ]);
    }
}
