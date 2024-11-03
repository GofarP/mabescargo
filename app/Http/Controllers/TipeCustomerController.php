<?php

namespace App\Http\Controllers;

use App\Models\TipeCustomer;
use Illuminate\Http\Request;

class TipeCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipecustomer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipecustomer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' =>'required|unique:tipe_customers,nama',
        ],[
            'nama.required'=>'Silahkan Masukkan Nama Kategori',
            'nama.unique'=>'Nama Tipe Customer Ini Sudah DIgunakan Sebelumnya',
        ]);

        TipeCustomer::create( $request->except(['_token','_method']));

        return redirect()->route('tipecustomer.index')->with('success', 'Tipe Customer Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeCustomer $tipeCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeCustomer $tipecustomer)
    {
        return view('tipecustomer.edit',compact('tipecustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeCustomer $tipecustomer)
    {
        $request->validate([
            'nama' =>'required|unique:tipe_customers,nama,'.$tipecustomer->id,
        ],[
            'nama.required'=>'Silahkan Masukkan Nama Kategori',
            'nama.unique'=>'Nama Tipe Customer Ini Sudah DIgunakan Sebelumnya',
        ]);

        TipeCustomerController::where('id',$tipecustomer->id)
        ->update( $request->except(['_token','_method']));

        return redirect()->route('tipecustomer.index')->with('success', 'Tipe Customer Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeCustomer $tipecustomer)
    {
        $tipecustomer->delete();

        return redirect()->route('tipecustomer.index')->with('success', 'Tipe Customer Berhasil Dihapus');
    }
}
