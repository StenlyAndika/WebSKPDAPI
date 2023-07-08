<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPengaduan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengaduan.index', [
            'title' => 'Data Alur Pengaduan',
            'pengaduan' => Pengaduan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pengaduan.create', [
            'title' => 'Tambah Alur Pengaduan'
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
            'namafile' => 'file|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            $validatedData['namafile'] = $request->file('namafile')->store('upload/pengaduan');
        }
        
        Pengaduan::create($validatedData);

        return redirect()->route('admin.pengaduan.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('dashboard.pengaduan.edit', [
            'title' => 'Edit Alur Pengaduan'
        ], compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Pengaduan $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $rules = [
            'namafile' => 'file|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('namafile')) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validatedData['namafile'] = $request->file('namafile')->store('upload/pengaduan');
        }
        
        Pengaduan::where('id', $pengaduan->id)->update($validatedData);

        return redirect()->route('admin.pengaduan.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if($pengaduan->namafile) {
            Storage::delete($pengaduan->namafile);
        }
        Pengaduan::destroy($pengaduan->id);
        return redirect()->route('admin.pengaduan.index')->with('success','Data berhasil dihapus!');
    }
}
