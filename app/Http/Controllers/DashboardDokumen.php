<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardDokumen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.dokumen.index', [
            'title' => 'Data Dokumen',
            'dokumen' => Dokumen::all()
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Dokumen::class, 'slug', $request->keterangan);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.dokumen.create', [
            'title' => 'Tambah Dokumen'
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
            'kategori' => 'required',
            'keterangan' => 'required',
            'slug' => 'required|unique:dokumen',
            'namafile' => 'file|mimes:pdf'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            $validatedData['namafile'] = $request->file('namafile')->store('upload/dokumen');
        }
        
        Dokumen::create($validatedData);

        return redirect()->route('admin.dokumen.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumen $dokumen)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumen $dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumen $dokumen)
    {
        return view('dashboard.dokumen.edit', [
            'title' => 'Edit Dokumen'
        ], compact('dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Dokumen $dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        $rules = [
            'kategori' => 'required',
            'keterangan' => 'required',
            'namafile' => 'file|mimes:pdf'
        ];

        if ($request->slug != $dokumen->slug) {
            $rules['slug'] = 'required|unique:Dokumen';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['namafile'] = $request->file('namafile')->store('upload/Dokumen');
        }
        
        Dokumen::where('id', $dokumen->id)->update($validatedData);

        return redirect()->route('admin.dokumen.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumen $dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumen $dokumen)
    {
        if($dokumen->namafile) {
            Storage::delete($dokumen->namafile);
        }
        Dokumen::destroy($dokumen->id);
        return redirect()->route('admin.dokumen.index')->with('success','Data berhasil dihapus!');
    }
}
