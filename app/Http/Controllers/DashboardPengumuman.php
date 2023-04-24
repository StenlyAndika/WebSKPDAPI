<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPengumuman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengumuman.index', [
            'title' => 'Data Pengumuman',
            'pengumuman' => Pengumuman::all()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pengumuman::class, 'slug', $request->judul);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengumuman.create', [
            'title' => 'Tambah Pengumuman'
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
            'judul' => 'required',
            'slug' => 'required|unique:pengumuman',
            'namafile' => 'file|mimes:pdf|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            $validatedData['namafile'] = $request->file('namafile')->store('upload/pengumuman');
        }
        
        Pengumuman::create($validatedData);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumuman $pengumuman)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumuman $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('dashboard.pengumuman.edit', [
            'title' => 'Edit Pengumuman'
        ], compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Pengumuman $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $rules = [
            'judul' => 'required',
            'namafile' => 'file|mimes:pdf'
        ];

        if ($request->slug != $pengumuman->slug) {
            $rules['slug'] = 'required|unique:pengumuman';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['namafile'] = $request->file('namafile')->store('upload/pengumuman');
        }
        
        Pengumuman::where('id', $pengumuman->id)->update($validatedData);

        return redirect()->route('admin.pengumuman.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumuman $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        if($pengumuman->namafile) {
            Storage::delete($pengumuman->namafile);
        }
        Pengumuman::destroy($pengumuman->id);
        return redirect()->route('admin.pengumuman.index')->with('success','Data berhasil dihapus!');
    }
}
