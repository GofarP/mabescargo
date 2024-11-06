<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use App\Models\Wilayah;
use App\Models\DaftarHarga;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DaftarHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('daftarharga.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_wilayah=Wilayah::get();
        $data_jalur=Jalur::get();
        return view('daftarharga.create',compact('data_wilayah', 'data_jalur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DaftarHarga::create($request->except(['_token','_method']));

        return redirect()->route('daftarharga.index')->with('success', 'Sukses Menambah Daftar Harga');
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarHarga $daftarHarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarHarga $daftarharga)
    {
        $data_wilayah=Wilayah::get();
        $data_jalur=Jalur::get();
        return view('daftarharga.edit',compact('data_wilayah', 'data_jalur','daftarharga'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarHarga $daftarharga)
    {
        $daftarharga->update($request->except(['_token','_method']));

        return redirect()->route('daftarharga.index')->with('success', 'Sukses Mengubah Daftar Harga');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarHarga $daftarharga)
    {
        $daftarharga->delete();

        return redirect()->route('daftarharga.index')->with('success', 'Sukses Menghapus Daftar Harga');
    }
}
