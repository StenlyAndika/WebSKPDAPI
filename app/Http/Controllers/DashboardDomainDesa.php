<?php

namespace App\Http\Controllers;

use App\Models\DomainDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardDomainDesa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.domaindesa.index', [
            'title' => 'Data Domain Desa',
            'domaindesa' => DomainDesa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.domaindesa.create', [
            'title' => 'Tambah Domain Desa'
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
            'kecamatan' => 'required',
            'domain' => 'required'
        ];

        $validatedData = $request->validate($rules);

        DomainDesa::create($validatedData);

        return redirect()->route('admin.domaindesa.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DomainDesa $domaindesa
     * @return \Illuminate\Http\Response
     */
    public function show(DomainDesa $domaindesa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DomainDesa $domaindesa
     * @return \Illuminate\Http\Response
     */
    public function edit(DomainDesa $domaindesa)
    {
        return view('dashboard.domaindesa.edit', [
            'title' => 'Edit Domain Desa'
        ], compact('domaindesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\DomainDesa $domaindesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DomainDesa $domaindesa)
    {
        $rules = [
            'nama' => 'required',
            'kecamatan' => 'required',
            'domain' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        DomainDesa::where('id', $domaindesa->id)->update($validatedData);

        return redirect()->route('admin.domaindesa.index')->with('success', 'Data berhasil diupdate!');
    }

    public function status(DomainDesa $domaindesa)
    {
        if($domaindesa->status == 1) {
            $data = [
                'status' => '0',
            ];
        } else {
            $data = [
                'status' => '1',
            ];
        }
    
        DomainDesa::where('id', $domaindesa->id)->update($data);

        return redirect()->route('admin.domaindesa.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DomainDesa $domaindesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DomainDesa $domaindesa)
    {
        DomainDesa::destroy($domaindesa->id);
        return redirect()->route('admin.domaindesa.index')->with('success','Data berhasil dihapus!');
    }
}
