<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;
    protected $table = 'wisata';
    protected $guarded = ['id'];

}
