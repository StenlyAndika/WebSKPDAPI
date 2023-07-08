<?php

namespace App\Http\Controllers;


use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardInformasi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.informasi.index', [
            'title' => 'Data Informasi',
            'informasi' => Informasi::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.informasi.index', [
            'title' => 'Tambah Informasi'
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
            'maklumat' => 'image'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['survey'] = $request->survey;

        if ($request->file('maklumat')) {
            $validatedData['maklumat'] = $request->file('maklumat')->store('upload/informasi');
        }

        if ($request->file('pengaduan')) {
            $validatedData['pengaduan'] = $request->file('pengaduan')->store('upload/informasi');
        }

        if ($request->file('ikm')) {
            $validatedData['ikm'] = $request->file('ikm')->store('upload/informasi');
        }

        Informasi::create($validatedData);

        return redirect()->route('admin.informasi.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informasi $informasi
     * @return \Illuminate\Http\Response
     */
    public function show(Informasi $informasi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informasi $informasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Informasi $informasi)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Informasi $informasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informasi $informasi)
    {
        $rules = [
            'maklumat' => 'image'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['survey'] = $request->survey;

        if ($request->file('maklumat')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['maklumat'] = $request->file('maklumat')->store('upload/informasi');
        }

        if ($request->file('pengaduan')) {
            if($request->oldImage2) {
                Storage::delete($request->oldImage2);
            }
            $validatedData['pengaduan'] = $request->file('pengaduan')->store('upload/informasi');
        }

        if ($request->file('ikm')) {
            if($request->oldImage3) {
                Storage::delete($request->oldImage3);
            }
            $validatedData['ikm'] = $request->file('ikm')->store('upload/informasi');
        }

        Informasi::where('id', $informasi->id)->update($validatedData);

        return redirect()->route('admin.informasi.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informasi $informasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Informasi $informasi)
    {
        if($informasi->maklumat) {
            Storage::delete($informasi->maklumat);
        }

        if($informasi->pengaduan) {
            Storage::delete($informasi->pengaduan);
        }

        if($informasi->ikm) {
            Storage::delete($informasi->ikm);
        }
        Informasi::destroy($informasi->id);
        return redirect()->route('admin.informasi.index')->with('success','Data berhasil dihapus!');
    }
}
