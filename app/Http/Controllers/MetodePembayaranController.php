<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('metodepembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metodepembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|unique:metode_pembayarans,nama',
        ]);

        MetodePembayaran::create($request->except(['_method','_token']));

        return redirect()->route('metodepembayaran.index')
            ->with('success', 'Metode Pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetodePembayaran $metodepembayaran)
    {
        return view('metodepembayaran.edit', compact('metodepembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodePembayaran $metodepembayaran)
    {
        $request->validate([
            'nama' =>'required|unique:metode_pembayarans,nama,'.$metodepembayaran->id,
        ]);

        $metodepembayaran->update($request->except(['_method','_token']));

        return redirect()->route('metodepembayaran.index')
            ->with('success', 'Metode Pembayaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodePembayaran $metodepembayaran)
    {
        $metodepembayaran->delete();

        return redirect()->route('metodepembayaran.index')
            ->with('success', 'Metode Pembayaran berhasil dihapus');
    }
}
