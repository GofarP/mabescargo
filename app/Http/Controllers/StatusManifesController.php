<?php

namespace App\Http\Controllers;

use App\Models\StatusManifes;
use Illuminate\Http\Request;

class StatusManifesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('statusmanifes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('statusmanifes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        StatusManifes::create($request->except(['_token','_method']));

        return redirect()->route('statusmanifes.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusManifes $statusManifes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusManifes $statusmanifes)
    {
        return view('statusmanifes.edit',compact('statusmanifes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusManifes $statusmanifes)
    {
        $statusmanifes->update($request->except(['_token','_method']));

        return redirect()->route('statusmanifes.index')->with('success','Sukses Mengubah Status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusManifes $statusmanifes)
    {
        $statusmanifes->delete();

        return redirect()->route('mtc.index')->with('success','Sukses Mengubah Status Manifes');
    }
}
