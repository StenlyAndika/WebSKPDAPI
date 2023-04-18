<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumen';
    protected $guarded = ['id'];

    public function alldokumen() {
        return Dokumen::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function dokumenbyid($tahun, $kategori) {
        return Dokumen::select('*')->whereYear('created_at', $tahun)->where('kategori', $kategori)->get();
    }
}
