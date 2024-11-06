<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_wilayah=Wilayah::get();

        return view('vendor.create',compact('data_wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Vendor::create($request->except(['_token','_method']));

        return redirect()->route('datavendor.index')->with('success','Sukses Menambah Vendor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $datavendor)
    {
        $data_wilayah=Wilayah::get();

        return view('vendor.edit',compact('datavendor','data_wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $datavendor)
    {
        Vendor::where('id',$datavendor->id)
        ->update($request->except(['_token','_method']));

        return redirect()->route('datavendor.index')->with('success','Sukses Mengubah Vendor');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $datavendor)
    {
        $datavendor->delete();

        return redirect()->route('datavendor.index')->with('success','Sukses Menghapus Vendor');
    }
}
