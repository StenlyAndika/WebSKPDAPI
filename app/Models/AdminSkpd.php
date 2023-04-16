<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSkpd extends Model
{
    use HasFactory;
    protected $table = 'sopd';
    protected $guarder = ['id'];
}
