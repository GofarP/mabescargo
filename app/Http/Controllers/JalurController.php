<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use Illuminate\Http\Request;

class JalurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jalur.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jalur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|unique:jalurs,nama',
        ]);

        Jalur::create($request->except(['_token','_method']));

        return redirect()->route('jalur.index')->with('success', 'Jalur berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jalur $jalur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jalur $jalur)
    {
        return view('jalur.edit', compact('jalur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jalur $jalur)
    {
        $request->validate([
            'nama' =>'required|unique:jalurs,nama,'.$jalur->id,
        ]);

        $jalur->update($request->except(['_token','_method']));

        return redirect()->route('jalur.index')->with('success', 'Jalur berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jalur $jalur)
    {
        $jalur->delete();
        return redirect()->route('jalur.index')->with('success', 'Jalur berhasil dihapus');
    }
}
