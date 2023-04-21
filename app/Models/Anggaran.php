<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggaran extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'anggaran';
    protected $guarded = ['id'];

    public function getRouteKeyName() {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'keterangan'
            ]
        ];
    }

    public function allanggaran() {
        return Anggaran::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function anggaranbyid($tahun) {
        return Anggaran::select('*')->whereYear('created_at', $tahun)->get();
    }
}
