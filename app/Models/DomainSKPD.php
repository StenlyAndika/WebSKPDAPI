<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainSKPD extends Model
{
    use HasFactory;
    protected $table = 'domainskpd';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function allHome() {
        return DomainSKPD::select('*')
        ->orderBy('nama', 'ASC')
        ->where('status', '1')->get();
    }
}
