<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function agendalimit($limit) {
        $todayDate = Carbon::today()->toDateString();
        $yesterdayDate = Carbon::yesterday()->toDateString();
        $tomorrowDate = Carbon::tomorrow()->toDateString();

        return Agenda::orWhereDate('tgl', $todayDate)
                    ->orWhereDate('tgl', $yesterdayDate)
                    ->orWhereDate('tgl', $tomorrowDate)
                    ->orderBy('tgl', 'DESC')
                    ->get();
    }
}
