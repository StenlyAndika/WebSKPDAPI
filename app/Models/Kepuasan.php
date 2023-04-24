<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepuasan extends Model
{
    use HasFactory;
    protected $table = 'kepuasan';
    protected $primaryKey = 'tahun';
    protected $fillable = ['tahun', 'nilai', 'predikat'];
    public $timestamps = false;

    public function getRouteKeyName() {
        return 'tahun';
    }
}
