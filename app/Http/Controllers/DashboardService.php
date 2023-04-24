<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardService extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.service.index', [
            'title' => 'Data Smart Service',
            'service' => Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create', [
            'title' => 'Tambah Smart Service'
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
            'ket' => 'required',
            'link' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Service::create($validatedData);

        return redirect()->route('admin.service.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.service.edit', [
            'title' => 'Edit Smart Service'
        ], compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'nama' => 'required',
            'ket' => 'required',
            'link' => 'required'
        ];

        $validatedData = $request->validate($rules);
        
        Service::where('id', $service->id)->update($validatedData);

        return redirect()->route('admin.service.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Service::destroy($service->id);
        return redirect()->route('admin.service.index')->with('success','Data berhasil dihapus!');
    }
}
