<?php

namespace App\Http\Controllers;

use App\Models\TingkatanWilayah;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wilayah.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_tingkatan_wilayah=TingkatanWilayah::get();
        return view('wilayah.create',compact('data_tingkatan_wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required|unique:wilayahs,nama',
            'tingkatan_wilayah_id'=>'required'
        ],[
            'nama.required'=>'Nama Wilayah harus diisi',
            'nama.unique'=>'Nama Wilayah sudah ada',
            'tingkatan_wilayah_id.required'=>'Tingkatan Wilayah harus dipilih'
        ]);

        Wilayah::create($request->except('_token','_method'));

        return redirect()->route('wilayah.index')->with('success','Data Wilayah berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        $data_tingkatan_wilayah=TingkatanWilayah::get();
        return view('wilayah.edit',compact('data_tingkatan_wilayah','wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'nama'=>'required|unique:wilayahs,nama,'.$wilayah->id,
            'tingkatan_wilayah_id'=>'required'
        ],[
            'nama.required'=>'Nama Wilayah harus diisi',
            'nama.unique'=>'Nama Wilayah sudah ada',
            'tingkatan_wilayah_id.required'=>'Tingkatan Wilayah harus dipilih'
        ]);

        $wilayah->update($request->except('_token','_method'));

        return redirect()->route('wilayah.index')->with('success','Data Wilayah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('wilayah.index')->with('success','Data Wilayah berhasil dihapus');
    }
}
