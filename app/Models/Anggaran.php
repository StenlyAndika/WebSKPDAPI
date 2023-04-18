<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggaran extends Model
{
    use HasFactory;
    protected $table = 'anggaran';
    protected $guarded = ['id'];

    public function allanggaran() {
        return Anggaran::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function anggaranbyid($tahun) {
        return Anggaran::select('*')->whereYear('created_at', $tahun)->get();
    }
}
