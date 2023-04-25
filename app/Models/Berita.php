<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory, Sluggable;
    protected $table = 'berita';
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
                'source' => 'judul'
            ]
        ];
    }

    public function allberitadashboard($user) {
        return Berita::select('*')->where('nama', $user)->get();
    }

    public function allberita() {
        return Berita::join('user', 'berita.nama', '=', 'user.username')
        ->select('berita.*', 'user.nama')
        ->orderBy('created_at', 'DESC')
        ->paginate(5);
    }

    public function singleberita($slug) {
        return Berita::join('user', 'berita.nama', '=', 'user.username')
        ->select('berita.*', 'user.nama')
        ->where('slug', $slug)->first();
    }

    public function beritalimit($limit) {
        return Berita::join('user', 'berita.nama', '=', 'user.username')
            ->select('berita.*', 'user.nama')
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
