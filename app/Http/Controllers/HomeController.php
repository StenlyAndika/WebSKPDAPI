<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Foto;
use App\Models\Skpd;
use App\Models\User;
use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Models\Anggaran;
use App\Models\Kepuasan;
use App\Models\Pengumuman;
use App\Models\DashboardProfil;
use App\Models\Penghargaan;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index', [
            'title' => 'Website Resmi Pemerintah Kota Sungai Penuh'
        ]);
    }

    public function kontak(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'wa' => 'required',
            'email' => 'required|email:dns',
            'pesan' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Kontak::create($validatedData);
        
        return redirect('/')->with('success', 'Pesan anda berhasil disubmit!');
    }

    public function berita()
    {
        return view('home.berita', [
            'title' => 'Berita Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::allberita()
        ]);
    }

    public function read($slug)
    {
        return view('home.read', [
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'singleberita' => Berita::singleberita($slug),
            'title' => Berita::singleberita($slug)->judul
        ]);
    }
    
    public function sejarah()
    {
        return view('home.profil.sejarah', [
            'title' => 'Sejarah Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function pendidikan()
    {
        return view('home.profil.pendidikan', [
            'title' => 'Pusat Pendidikan Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'pendidikan' => DashboardProfil::allpendidikan(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function kesehatan()
    {
        return view('home.profil.kesehatan', [
            'title' => 'Pusat Kesehatan Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'kesehatan' => DashboardProfil::allkesehatan(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function keuangan()
    {
        return view('home.profil.keuangan', [
            'title' => 'Pusat Keuangan Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'keuangan' => DashboardProfil::allkeuangan(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function perbelanjaan()
    {
        return view('home.profil.perbelanjaan', [
            'title' => 'Pusat Perbelanjaan Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'perbelanjaan' => DashboardProfil::allperbelanjaan(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function hotel()
    {
        return view('home.profil.hotel', [
            'title' => 'Pusat Hotel Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'hotel' => DashboardProfil::allhotel(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function wisata()
    {
        return view('home.profil.wisata', [
            'title' => 'Wisata Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function foto()
    {
        return view('home.galeri.foto', [
            'title' => 'Galeri Foto Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'foto' => Foto::allfoto()
        ]);
    }

    public function video()
    {
        return view('home.galeri.video', [
            'title' => 'Galeri Video Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function penghargaan()
    {
        return view('home.galeri.penghargaan', [
            'title' => 'Penghargaan Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'penghargaan' => Penghargaan::all()
        ]);
    }

    public function anggaran()
    {
        return view('home.publikasi.anggaran', [
            'title' => 'Transparansi Anggaran Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'anggaran' => Anggaran::allanggaran()
        ]);
    }

    public function dokumen()
    {
        return view('home.publikasi.dokumen', [
            'title' => 'Publikasi Dokumen Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'dokumen' => Dokumen::alldokumen()
        ]);
    }

    public function pengumuman()
    {
        return view('home.publikasi.pengumuman', [
            'title' => 'Pengumuman Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'pengumuman' => Pengumuman::all()
        ]);
    }

    public function skpd()
    {
        return view('home.situs.skpd', [
            'title' => 'Website SKPD Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'skpd' => Skpd::orderBy('nama', 'ASC')->get()
        ]);
    }

    public function desa()
    {
        return view('home.situs.desa', [
            'title' => 'Website Desa Kota Sungai Penuh',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'berita' => Berita::beritalimit(3),
            'desa' => Desa::orderBy('nama', 'ASC')->get()
        ]);
    }
}
