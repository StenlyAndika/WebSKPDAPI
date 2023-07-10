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
use App\Models\Informasi;
use App\Models\Pelayanan;
use App\Models\Pengaduan;
use App\Models\DomainDesa;
use App\Models\DomainSKPD;
use App\Models\Pengumuman;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use App\Models\DashboardProfil;
// use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        // DB::statement("ALTER TABLE `informasi` ADD `pakta` TEXT NULL DEFAULT NULL AFTER `maklumat`");
        return view('home.index', [
            'title' => Profil::first() ? 'Website Resmi '.Profil::first()->nama : 'Website Resmi Instansi',
            'profil' => Profil::first(),
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
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
            'informasi' => Informasi::first(),
            'pengumuman' => Pengumuman::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function penghargaan()
    {
        return view('home.galeri.penghargaan', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Penghargaan '.Profil::first()->nama : 'Penghargaan Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'informasi' => Informasi::first(),
            'penghargaan' => Penghargaan::all()
        ]);
    }

    public function maklumat()
    {
        return view('home.maklumat', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Maklumat Pelayanan '.Profil::first()->nama : 'Maklumat Pelayanan Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'informasi' => Informasi::first()
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
            'informasi' => Informasi::first(),
            'pelayanan' => Pelayanan::all()
        ]);
    }

    public function detail($id)
    {
        return view('home.detail', [
            'profil' => Profil::first(),
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'informasi' => Informasi::first(),
            'berita' => Berita::beritalimit(3),
            'pelayanan' => Pelayanan::where('id', $id)->first(),
            'title' => Pelayanan::where('id', $id)->first()->jenis
        ]);
    }

    public function pengaduan()
    {
        return view('home.pengaduan', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Alur Pengaduan '.Profil::first()->nama : 'Alur Pengaduan Instansi',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'informasi' => Informasi::first()
        ]);
    }

    public function ikm()
    {
        return view('home.ikm', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Indeks Kepuasan Masyarakat '.Profil::first()->nama : 'Indeks Kepuasan Masyarakat',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'informasi' => Informasi::first()
        ]);
    }

    public function pakta()
    {
        return view('home.pakta', [
            'profil' => Profil::first(),
            'title' => Profil::first() ? 'Pakta Integritas '.Profil::first()->nama : 'Pakta Integritas',
            'kepuasan' => Kepuasan::orderBy('tahun', 'DESC')->limit(5)->get(),
            'agenda' => Agenda::agendalimit('3'),
            'berita' => Berita::beritalimit(3),
            'informasi' => Informasi::first()
        ]);
    }

}
