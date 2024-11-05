<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\SebarBrosur;
use Illuminate\Http\Request;

class SebarBrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sebarbrosur.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_karyawan=Karyawan::get();
        return view('sebarbrosur.create',compact('data_karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SebarBrosur::create($request->except(['_token','_method']));

        return redirect()->route('sebarbrosur.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SebarBrosur $sebarBrosur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SebarBrosur $sebarbrosur)
    {
        $data_karyawan=Karyawan::get();
        return view('sebarbrosur.edit', compact('sebarbrosur','data_karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SebarBrosur $sebarbrosur)
    {
        $sebarbrosur->update(attributes: $request->except(['_token','_method']));

        return redirect()->route('sebarbrosur.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SebarBrosur $sebarbrosur)
    {
        $sebarbrosur->delete();

        return redirect()->route('sebarbrosur.index')->with('success', 'Data berhasil dihapus');
    }

    public function print(Request $request){
        $mulai_dari=$request->mulai_dari;
        $sampai_dengan=$request->sampai_dengan;

        $data_sebar_brosur=SebarBrosur::with('karyawan')
        ->whereBetween('tanggal',[$request->mulai_dari,$request->sampai_dengan])
        ->get();

        return view('sebarbrosur.print',compact('mulai_dari','sampai_dengan','data_sebar_brosur'));
    }
}
