<?php

namespace App\Http\Controllers;

use App\Models\PesananMbs;
use Illuminate\Http\Request;

class PesananMbsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pesananmbs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesananmbs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PesananMbs::create($request->except(['_token','_method']));

        return redirect()->route()->with('success','Sukses Meambah Pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PesananMbs $pesananMbs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesananMbs $pesananMbs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesananMbs $pesananMbs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesananMbs $pesananMbs)
    {
        //
    }
}
