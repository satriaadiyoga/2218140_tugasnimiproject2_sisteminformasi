<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class datadokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('dokter.index')->with([
            'dokter' => Dokter::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_lengkap'=>'required|min:3',
            'jenis_kelamin'=>'required|min:3',
            'spesialisasi'=>'required|min:3',
            'nomor_telepon'=>'required|min:3',
            'alamat'=>'required|min:3',
        ]);

        $dktr = new Dokter;
        $dktr->nama_lengkap = $request->nama_lengkap;
        $dktr->jenis_kelamin= $request->jenis_kelamin;
        $dktr->spesialisasi = $request->spesialisasi;
        $dktr->nomor_telepon= $request->nomor_telepon;
        $dktr->alamat= $request->alamat;
        $dktr->save();

        return to_route('dokter.index')->with('success','Data Berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'spesialisasi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id_dokter)
    {
        $dokter = Dokter::findOrFail($id_dokter);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success','data berhasil di hapus');
    }
}
