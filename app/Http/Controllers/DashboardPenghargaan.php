<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPenghargaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.penghargaan.index', [
            'title' => 'Data Penghargaan',
            'penghargaan' => Penghargaan::all()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Penghargaan::class, 'slug', $request->keterangan);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penghargaan.create', [
            'title' => 'Tambah Penghargaan'
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
            'keterangan' => 'required',
            'slug' => 'required|unique:penghargaan',
            'namafile' => 'required|file'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            $validatedData['namafile'] = $request->file('namafile')->store('upload/penghargaan');
        }
        
        Penghargaan::create($validatedData);

        return redirect()->route('admin.penghargaan.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggaran $penghargaan
     * @return \Illuminate\Http\Response
     */
    public function show(Anggaran $penghargaan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggaran $penghargaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggaran $penghargaan)
    {
        return view('dashboard.penghargaan.edit', [
            'title' => 'Edit Penghargaan'
        ], compact('penghargaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Anggaran $penghargaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggaran $penghargaan)
    {
        $rules = [
            'keterangan' => 'required',
            'namafile' => 'required|file'
        ];

        if ($request->slug != $penghargaan->slug) {
            $rules['slug'] = 'required|unique:penghargaan';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['namafile'] = $request->file('namafile')->store('upload/penghargaan');
        }
        
        Penghargaan::where('id', $penghargaan->id)->update($validatedData);

        return redirect()->route('admin.penghargaan.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggaran $penghargaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggaran $penghargaan)
    {
        if($penghargaan->namafile) {
            Storage::delete($penghargaan->namafile);
        }
        Penghargaan::destroy($penghargaan->id);
        return redirect()->route('admin.penghargaan.index')->with('success','Data berhasil dihapus!');
    }
}
