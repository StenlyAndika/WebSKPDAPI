<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardFoto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.foto.index', [
            'title' => 'Data Foto',
            'foto' => Foto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.foto.create', [
            'title' => 'Tambah Foto'
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
            'namafile.*' => 'required|image|max:2048',
            'kegiatan' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $namafiles = $request->file('namafile');
        
        $ctime = Carbon::now()->isoFormat('D-MM-Y');

        foreach ($namafiles as $file) {
            $uploadData = $file->store('upload/foto/'.$ctime.'/');
        
            $data = [
                'namafile' => $uploadData,
                'kegiatan' => $request->input('kegiatan'),
            ];
        
            Foto::create($data);
        }

        return redirect()->route('admin.foto.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Foto $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        if($foto->namafile) {
            Storage::delete($foto->namafile);
        }
        Foto::destroy($foto->id);
        return redirect()->route('admin.foto.index')->with('success','Data berhasil dihapus!');
    }
}
