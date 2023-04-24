<?php

namespace App\Http\Controllers;

use App\Models\Kepuasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardKepuasan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kepuasan.index', [
            'title' => 'Data Index Kepuasan Masyarakat',
            'kepuasan' => Kepuasan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kepuasan.create', [
            'title' => 'Tambah Index Kepuasan Masyarakat'
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
            'tahun' => 'required',
            'nilai' => 'required',
            'predikat' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Kepuasan::create($validatedData);

        return redirect()->route('admin.kepuasan.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepuasan $kepuasan
     * @return \Illuminate\Http\Response
     */
    public function show(Kepuasan $kepuasan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kepuasan $kepuasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepuasan $kepuasan)
    {
        return view('dashboard.kepuasan.edit', [
            'title' => 'Edit Index Kepuasan Masyarakat'
        ], compact('kepuasan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Kepuasan $kepuasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kepuasan $kepuasan)
    {
        $rules = [
            'tahun' => 'required',
            'nilai' => 'required',
            'predikat' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Kepuasan::where('tahun', $kepuasan->tahun)->update($validatedData);

        return redirect()->route('admin.kepuasan.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepuasan $kepuasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepuasan $kepuasan)
    {
        Kepuasan::destroy($kepuasan->tahun);
        return redirect()->route('admin.kepuasan.index')->with('success','Data berhasil dihapus!');
    }
}
