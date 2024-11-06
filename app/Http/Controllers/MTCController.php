<?php

namespace App\Http\Controllers;

use App\Models\MTC;
use Illuminate\Http\Request;

class MTCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mtc.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mtc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $nama_image = uniqid() . '-' . $request->file('image')->getClientOriginalName();
            $tujuanupload = 'imagemtc';
            $file = $tujuanupload . '/' . $nama_image;

            $data_mtc['image'] = $file;
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(MTC $mTC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MTC $mTC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MTC $mTC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MTC $mTC)
    {
        //
    }
}
