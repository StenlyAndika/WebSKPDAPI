<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardAgenda extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.agenda.index', [
            'title' => 'Data Agenda Kegiatan',
            'agenda' => Agenda::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.agenda.create', [
            'title' => 'Tambah Agenda Kegiatan'
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
            'tgl' => 'required',
            'jam' => 'required',
            'kegiatan' => 'required',
            'lokasi' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Agenda::create($validatedData);

        return redirect()->route('admin.agenda.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return view('dashboard.agenda.edit', [
            'title' => 'Edit Agenda Kegiatan'
        ], compact('agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $rules = [
            'tgl' => 'required',
            'jam' => 'required',
            'kegiatan' => 'required',
            'lokasi' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Agenda::where('tahun', $agenda->tahun)->update($validatedData);

        return redirect()->route('admin.agenda.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        Agenda::destroy($agenda->tahun);
        return redirect()->route('admin.agenda.index')->with('success','Data berhasil dihapus!');
    }
}
