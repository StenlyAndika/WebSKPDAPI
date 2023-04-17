<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDokumen extends Model
{
    use HasFactory;
    protected $table = 'dokumen';
    protected $guarded = ['id'];

    public function alldokumen() {
        return AdminDokumen::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function dokumenbyid($tahun, $kategori) {
        return AdminDokumen::select('*')->whereYear('created_at', $tahun)->where('kategori', $kategori)->get();
    }
}
