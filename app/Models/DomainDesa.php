<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainDesa extends Model
{
    use HasFactory;
    protected $table = 'domaindesa';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function allHome() {
        return DomainDesa::select('*')
        ->orderBy('nama', 'ASC')
        ->where('status', '1')->get();
    }
}
