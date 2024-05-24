<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pasien.index')->with([
            'pasien' => Pasien::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_lengkap'=>'required|min:3',
            'jenis_kelamin'=>'required|min:3',
            'tanggal_lahir'=>'required|min:3',
            'nomor_telepon'=>'required|min:3',
            'alamat'=>'required|min:3',
            'riwayat_penyakit'=>'required|min:3',
        ]);

        $psn = new Pasien;
        $psn->nama_lengkap = $request->nama_lengkap;
        $psn->jenis_kelamin= $request->jenis_kelamin;
        $psn->tanggal_lahir = $request->tanggal_lahir;
        $psn->nomor_telepon = $request->nomor_telepon;
        $psn->alamat = $request->alamat;
        $psn->riwayat_penyakit = $request->riwayat_penyakit;
        $psn->save();

        return redirect()->route('pasien.index')->with('success','Data Berhasil di tambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:10',
            'tanggal_lahir' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'riwayat_penyakit' => 'required|string|max:255',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pasien)
    {
        $pasien = Pasien::findOrFail($id_pasien);
        $pasien->delete();

        return redirect()->route('pasien.index')->with('success','data berhasil di hapus');
    }
}
