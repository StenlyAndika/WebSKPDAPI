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

    // API ---------------------------------------------------------

    public function apiAllBerita() {
        $query = Berita::join('user', 'berita.nama', '=', 'user.username')
            ->crossJoin('profil')
            ->select('berita.*', 'user.nama', 'profil.nama as kategori');
    
        if (request('search')) {
            $query->where('berita.judul', 'LIKE', '%' . request('search') . '%')->orWhere('user.nama', 'LIKE', '%' . request('search') . '%');
        }

        $query->orderBy('created_at', 'DESC');
        $perPage = request('per_page', 10);
        $page = request('page', 1);
        $offset = ($page - 1) * $perPage;
        return $query->offset($offset)->limit($perPage)->get();
    }

    public function apiAllBeritaCarousel() {
        return Berita::join('user', 'berita.nama', '=', 'user.username')
        ->select('berita.*', 'user.nama')
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->get();
    }
}
