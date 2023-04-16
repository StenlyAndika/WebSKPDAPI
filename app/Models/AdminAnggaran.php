<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminAnggaran extends Model
{
    use HasFactory;
    protected $table = 'anggaran';
    protected $guarded = ['id'];

    public function allanggaran() {
        return AdminAnggaran::select('*')
            ->orderBy('tahun', 'DESC')
            ->get();
    }

    public function anggaranbyid($tahun) {
        return AdminAnggaran::select('*')->where('tahun', $tahun)->get();
    }
}
