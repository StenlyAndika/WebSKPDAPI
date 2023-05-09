<?php

namespace App\Http\Controllers;


use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardProfil extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profil.index', [
            'title' => 'Data Profil',
            'profil' => Profil::first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profil.index', [
            'title' => 'Tambah Profil'
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
            'kepala' => 'required',
            'fotokepala' => 'image|file',
            'logo' => 'image|file',
            'struktur' => 'image|file'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['alamat'] = $request->alamat;
        $validatedData['sejarah'] = $request->sejarah;
        $validatedData['visi'] = $request->visi;
        $validatedData['misi'] = $request->misi;
        $validatedData['tugas'] = $request->tugas;
        $validatedData['email'] = $request->email;
        $validatedData['wa'] = $request->wa;
        $validatedData['fb'] = $request->fb;
        $validatedData['tw'] = $request->tw;
        $validatedData['ig'] = $request->ig;

        if ($request->file('fotokepala')) {
            $validatedData['fotokepala'] = $request->file('fotokepala')->store('upload/profil');
        }

        if ($request->file('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('upload/profil');
        }

        if ($request->file('struktur')) {
            $validatedData['struktur'] = $request->file('struktur')->store('upload/profil');
        }
        
        Profil::create($validatedData);

        return redirect()->route('admin.profil.index')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Profil $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
        // dd($request);
        $rules = [
            'nama' => 'required',
            'kepala' => 'required',
            'fotokepala' => 'image|file',
            'logo' => 'image|file',
            'struktur' => 'image|file'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['sejarah'] = $request->sejarah;
        $validatedData['visi'] = $request->visi;
        $validatedData['misi'] = $request->misi;
        $validatedData['tugas'] = $request->tugas;
        $validatedData['email'] = $request->email;
        $validatedData['wa'] = $request->wa;
        $validatedData['fb'] = $request->fb;
        $validatedData['tw'] = $request->tw;
        $validatedData['ig'] = $request->ig;

        if ($request->file('fotokepala')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['fotokepala'] = $request->file('fotokepala')->store('upload/profil');
        }

        if ($request->file('logo')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['logo'] = $request->file('logo')->store('upload/profil');
        }

        if ($request->file('struktur')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['struktur'] = $request->file('struktur')->store('upload/profil');
        }

        Profil::where('id', $profil->id)->update($validatedData);

        return redirect()->route('admin.profil.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        if($profil->fotokepala) {
            Storage::delete($profil->fotokepala);
        }
        if($profil->struktur) {
            Storage::delete($profil->struktur);
        }
        if($profil->logo) {
            Storage::delete($profil->logo);
        }
        Profil::destroy($profil->id);
        return redirect()->route('admin.profil.index')->with('success','Data berhasil dihapus!');
    }
}
