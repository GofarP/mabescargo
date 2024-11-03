<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:karyawans,nama',
        ], [
            'nama.required' => 'Silahkan Masukkan Nama Karyawan',
            'nama.unique' => 'Nama Karyawan Ini Sudah DIgunakan Sebelumnya',
        ]);

        Karyawan::create($request->except(['_token', '_method']));

        return redirect()->route('karyawan.index')->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required|unique:karyawans,nama,'.$karyawan->id,
        ], [
            'nama.required' => 'Silahkan Masukkan Nama Karyawan',
            'nama.unique' => 'Nama Karyawan Ini Sudah DIgunakan Sebelumnya',
        ]);

        Karyawan::where('id',$karyawan->id)->update($request->except(['_method','_token']));

        return redirect()->route('karyawan.index')->with('success', 'Karyawan Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan Berhasil Dihapus');
    }
}
