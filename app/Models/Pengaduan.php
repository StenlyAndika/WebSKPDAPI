<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $guarded = ['id'];

}
