<?php

namespace App\Http\Controllers;

use App\Models\DomainSKPD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardDomainSKPD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.domainskpd.index', [
            'title' => 'Data Domain SKPD',
            'domainskpd' => DomainSKPD::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.domainskpd.create', [
            'title' => 'Tambah Domain SKPD'
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
            'nama' => 'required',
            'domain' => 'required'
        ];

        $validatedData = $request->validate($rules);

        DomainSKPD::create($validatedData);

        return redirect()->route('admin.domainskpd.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DomainSKPD $domainskpd
     * @return \Illuminate\Http\Response
     */
    public function show(DomainSKPD $domainskpd)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DomainSKPD $domainskpd
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainSKPD $domainskpd)
    {
        return view('dashboard.domainskpd.edit', [
            'title' => 'Edit Domain SKPD'
        ], compact('domainskpd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\DomainSKPD $domainskpd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomainSKPD $domainskpd)
    {
        $rules = [
            'nama' => 'required',
            'domain' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        DomainSKPD::where('id', $domainskpd->id)->update($validatedData);

        return redirect()->route('admin.domainskpd.index')->with('success', 'Data berhasil diupdate!');
    }

    public function status(DomainSKPD $domainskpd)
    {
        if($domainskpd->status == 1) {
            $data = [
                'status' => '0',
            ];
        } else {
            $data = [
                'status' => '1',
            ];
        }
    
        DomainSKPD::where('id', $domainskpd->id)->update($data);

        return redirect()->route('admin.domainskpd.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DomainSKPD $domainskpd
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainSKPD $domainskpd)
    {
        DomainSKPD::destroy($domainskpd->id);
        return redirect()->route('admin.domainskpd.index')->with('success','Data berhasil dihapus!');
    }
}
