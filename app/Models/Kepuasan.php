<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepuasan extends Model
{
    use HasFactory;
    protected $table = 'kepuasan';
    protected $guarded = ['id'];
}
