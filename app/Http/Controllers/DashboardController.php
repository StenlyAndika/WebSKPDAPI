<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Admin',
            'pesan' => Kontak::orderBy('created_at', 'DESC')->limit(10)->get()
        ]);
    }

    public function tutorial()
    {
        return view('dashboard.profil.tutorial', [
            'title' => 'Tutorial Pengambilan Lokasi'
        ]);
    }

    public function destroy(Kontak $kontak)
    {
        Kontak::destroy($kontak->id);
        return redirect()->route('admin.dashboard')->with('success','Pesan berhasil dihapus!');
    }
}
