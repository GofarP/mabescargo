<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cabang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:cabangs,nama'
        ], [
            'nama.required' => 'Silahkan Masukkan Nama Cabang',
            'nama.unique' => 'Nama Sudah Dipakai Sebelumnya'
        ]);

        Cabang::create($request->except(['_token', '_method']));

        return redirect()->route('cabang.index')->with('success', 'Data Cabang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabang $cabang)
    {
        return view('cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabang $cabang)
    {
        $request->validate([
            'nama' => 'required|unique:cabangs,nama,'.$cabang->id
        ], [
            'nama.required' => 'Silahkan Masukkan Nama Cabang',
            'nama.unique' => 'Nama Sudah Dipakai Sebelumnya'
        ]);

        $cabang->update($request->except(['_token', '_method']));
        return redirect()->route('cabang.index')->with('success', 'Data Cabang Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabang $cabang)
    {
        $cabang->delete();
        return redirect()->route('cabang.index')->with('success', 'Data Cabang Berhasil Dihapus');
    }
}
