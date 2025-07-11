<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'foto';
    protected $guarded = ['id'];
    
    public function allfoto() {
        return Foto::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function fotobyid($kegiatan) {
        return Foto::select('*')->where('kegiatan', $kegiatan)->get();
    }
}
