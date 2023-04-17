<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminFoto extends Model
{
    use HasFactory;
    protected $table = 'foto';
    protected $guarded = ['id'];
    
    public function allfoto() {
        return AdminFoto::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function fotobyid($kegiatan) {
        return AdminFoto::select('*')->where('kegiatan', $kegiatan)->get();
    }
}
