<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kontak.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kontaks,nama'
        ], [
            'nama.required' => 'Silahkan Masukkan Nama Kontak',
            'nama.unique' => 'Nama Kontak Ini Sudah DIgunakan Sebelumnya',
        ]);

        Kontak::create($request->except(['_method', '_token']));

        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        return view('kontak.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'nama' => 'required|unique:kontaks,nama,'.$kontak->id
        ], [
            'nama.required' => 'Silahkan Masukkan Nama Kontak',
            'nama.unique' => 'Nama Kontak Ini Sudah DIgunakan Sebelumnya',
        ]);

        Kontak::where('id',$kontak->id)->update($request->except(['_method', '_token']));

        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Dihapus');
    }
}
