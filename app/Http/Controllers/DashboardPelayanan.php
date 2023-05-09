<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPelayanan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pelayanan.index', [
            'title' => 'Data Pelayanan',
            'pelayanan' => Pelayanan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelayanan.create', [
            'title' => 'Tambah Pelayanan'
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
            'jenis' => 'required',
            'standar' => 'required',
            'gambar' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('upload/pelayanan');
        }
        
        Pelayanan::create($validatedData);

        return redirect()->route('admin.pelayanan.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelayanan $pelayanan)
    {
        return view('dashboard.pelayanan.detail', [
            'title' => 'Detail Pelayanan'
        ], compact('pelayanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelayanan $pelayanan)
    {
        return view('dashboard.pelayanan.edit', [
            'title' => 'Edit Pelayanan'
        ], compact('pelayanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelayanan $pelayanan)
    {
        $rules = [
            'judul' => 'required',
            'standar' => 'required',
            'gambar' => 'image|file'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('upload/pelayanan');
        }
        
        Pelayanan::where('id', $pelayanan->id)->update($validatedData);

        return redirect()->route('admin.pelayanan.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelayanan $pelayanan)
    {
        if($pelayanan->gambar) {
            Storage::delete($pelayanan->gambar);
        }
        Pelayanan::destroy($pelayanan->id);
        return redirect()->route('admin.pelayanan.index')->with('success','Data berhasil dihapus!');
    }
}
