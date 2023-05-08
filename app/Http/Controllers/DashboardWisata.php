<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardWisata extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.wisata.index', [
            'title' => 'Data Wisata',
            'wisata' => Wisata::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wisata.create', [
            'title' => 'Tambah Wisata'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'lokasi' => 'required',
            'gambar' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('upload/wisata');
        }
        
        Wisata::create($validatedData);

        return redirect()->route('admin.wisata.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita $wisata
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $wisata)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita $wisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $wisata)
    {
        return view('dashboard.wisata.edit', [
            'title' => 'Edit Wisata'
        ], compact('wisata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Berita $wisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $wisata)
    {
        $rules = [
            'lokasi' => 'required',
            'gambar' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('upload/wisata');
        }
        
        Wisata::where('id', $wisata->id)->update($validatedData);

        return redirect()->route('admin.wisata.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita $wisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $wisata)
    {
        if($wisata->gambar) {
            Storage::delete($wisata->gambar);
        }
        Wisata::destroy($wisata->id);
        return redirect()->route('admin.wisata.index')->with('success','Data berhasil dihapus!');
    }
}
