<?php

namespace App\Models;

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
        return AdminBerita::join('user', 'berita.nama', '=', 'user.username')
        ->select('berita.*', 'user.nama')
        ->orderBy('created_at', 'DESC')
        ->limit($limit)
        ->get();
    }

    public function singleberita($slug) {
        return AdminBerita::join('user', 'berita.nama', '=', 'user.username')
        ->select('berita.*', 'user.nama')
        ->where('slug', $slug)->first();
    }

    public function beritalimit($limit) {
        return AdminBerita::select('*')
            ->orderBy('created_at', 'DESC')
            ->limit($limit)
            ->get();
    }
}
