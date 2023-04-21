<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardAnggaran extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.anggaran.index', [
            'title' => 'Data Anggaran',
            'anggaran' => Anggaran::all()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Anggaran::class, 'slug', $request->keterangan);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.anggaran.create', [
            'title' => 'Tambah Anggaran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'keterangan' => 'required',
            'slug' => 'required|unique:anggaran',
            'namafile' => 'file|mimes:pdf|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            $validatedData['namafile'] = $request->file('namafile')->store('upload/anggaran');
        }
        
        Anggaran::create($validatedData);

        return redirect()->route('admin.anggaran.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Anggaran $anggaran)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggaran $anggaran)
    {
        return view('dashboard.anggaran.edit', [
            'title' => 'Edit Anggaran'
        ], compact('anggaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggaran $anggaran)
    {
        $rules = [
            'keterangan' => 'required',
            'namafile' => 'mimes:pdf'
        ];

        if ($request->slug != $anggaran->slug) {
            $rules['slug'] = 'required|unique:anggaran';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['namafile'] = $request->file('namafile')->store('upload/anggaran');
        }
        
        Anggaran::where('id', $anggaran->id)->update($validatedData);

        return redirect()->route('admin.anggaran.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggaran $anggaran)
    {
        if($anggaran->namafile) {
            Storage::delete($anggaran->namafile);
        }
        Anggaran::destroy($anggaran->id);
        return redirect()->route('admin.anggaran.index')->with('success','Data berhasil dihapus!');
    }
}
