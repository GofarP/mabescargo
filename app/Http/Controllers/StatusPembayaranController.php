<?php

namespace App\Http\Controllers;

use App\Models\StatusPembayaran;
use Illuminate\Http\Request;

class StatusPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('statuspembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuspembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|unique:status_pembayarans,nama',
        ]);

        StatusPembayaran::create($request->all());

        return redirect()->route('statuspembayaran.index')
            ->with('success', 'Status Pembayaran Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusPembayaran $statusPembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusPembayaran $statuspembayaran)
    {
       return view('statuspembayaran.edit',compact('statuspembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusPembayaran $statuspembayaran)
    {
        $request->validate([
            'nama' =>'required|unique:status_pembayarans,nama,'.$statuspembayaran->id,
        ]);

        $statuspembayaran->update($request->except(['_method','_token']));

        return redirect()->route('statuspembayaran.index')
            ->with('success', 'Status Pembayaran Berhasil Diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusPembayaran $statuspembayaran)
    {
        $statuspembayaran->delete();

        return redirect()->route('statuspembayaran.index')
            ->with('success', 'Status Pembayaran Berhasil Dihapus.');
    }
}
