<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminFoto extends Model
{
    use HasFactory;
    protected $table = 'foto';
    protected $guarded = ['id'];
    
    public function allfoto() {
        return AdminFoto::select('*', DB::raw("str_to_date(tgl, '%d-%m-%Y') as tgl"))
            ->orderBy('tgl', 'DESC')
            ->get();
    }

    public function fotobyid($kegiatan) {
        return AdminFoto::select('*')->where('kegiatan', $kegiatan)->get();
    }
}
