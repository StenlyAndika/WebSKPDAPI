<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokumen extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'dokumen';
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

    public function alldokumen() {
        return Dokumen::select('*')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function dokumenbyid($tahun, $kategori) {
        return Dokumen::select('*')->whereYear('created_at', $tahun)->where('kategori', $kategori)->get();
    }
}
