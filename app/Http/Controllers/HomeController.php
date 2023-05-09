<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Kontak;
use App\Models\Profil;
use App\Models\Wisata;
use App\Models\Dokumen;
use App\Models\Anggaran;
use App\Models\Kepuasan;
use App\Models\Pelayanan;
use App\Models\DomainDesa;
use App\Models\DomainSKPD;
use App\Models\Pengumuman;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use App\Models\DashboardProfil;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index', [
            'title' => Profil::first() ? 'Website Resmi '.Profil::first()->nama : 'Website Resmi Instansi',
            'profil' => Profil::first(),
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::allberita()
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
        
        return redirect()->route('home')->with('success', 'Pesan anda berhasil disubmit!');
    }

    public function read($slug)
    {
        return view('home.read', [
            'profil' => Profil::first(),
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'singleberita' => Berita::singleberita($slug),
            'title' => Berita::singleberita($slug)->judul
        ]);
    }
    
    public function sejarah()
    {
        return view('home.profil.sejarah', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Sejarah '.Profil::first()->nama : 'Sejarah Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function visimisi()
    {
        return view('home.profil.visimisi', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Visi & Misi '.Profil::first()->nama : 'Visi & Misi Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function struktur()
    {
        return view('home.profil.struktur', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Visi & Misi '.Profil::first()->nama : 'Visi & Misi Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3)
        ]);
    }

    public function foto()
    {
        return view('home.galeri.foto', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Galeri Foto '.Profil::first()->nama : 'Galeri Foto Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'foto' => Foto::allfoto()
        ]);
    }

    public function anggaran()
    {
        return view('home.publikasi.anggaran', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Transparansi Anggaran '.Profil::first()->nama : 'Transparansi Anggaran Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'anggaran' => Anggaran::allanggaran()
        ]);
    }

    public function dokumen()
    {
        return view('home.publikasi.dokumen', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Publikasi Dokumen '.Profil::first()->nama : 'Publikasi Dokumen Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'dokumen' => Dokumen::alldokumen()
        ]);
    }

    public function pengumuman()
    {
        return view('home.publikasi.pengumuman', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Pengumuman '.Profil::first()->nama : 'Pengumuman Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'pengumuman' => Pengumuman::all()
        ]);
    }

    public function penghargaan()
    {
        return view('home.publikasi.penghargaan', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Penghargaan '.Profil::first()->nama : 'Penghargaan Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'penghargaan' => Penghargaan::all()
        ]);
    }

    public function pelayanan()
    {
        return view('home.pelayanan', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Standar Pelayanan '.Profil::first()->nama : 'Standar Pelayanan Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'pelayanan' => Pelayanan::all()
        ]);
    }

    public function detail($id)
    {
        return view('home.detail', [
            'profil' => Profil::first(),
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'pelayanan' => Pelayanan::where('id', $id)->first(),
            'title' => Pelayanan::where('id', $id)->first()->jenis
        ]);
    }

}
