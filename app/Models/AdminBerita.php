<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminBerita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function allberita($limit) {
        return AdminBerita::join('admin', 'berita.nama', '=', 'admin.username')
        ->select('berita.*', 'admin.nama', DB::raw("str_to_date(berita.tgl, '%d-%m-%Y') as tgl"))
        ->orderBy('tgl', 'DESC')
        ->limit($limit)
        ->get();
    }

    public function singleberita($slug) {
        return AdminBerita::join('admin', 'berita.nama', '=', 'admin.username')
        ->select('berita.*', 'admin.nama')
        ->where('slug', $slug)->first();
    }

    public function beritalimit($limit) {
        return AdminBerita::select('*', DB::raw("str_to_date(tgl, '%d-%m-%Y') as tgl"))
            ->orderBy('tgl', 'DESC')
            ->limit($limit)
            ->get();
    }
}
