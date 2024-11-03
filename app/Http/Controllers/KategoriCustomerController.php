<?php

namespace App\Http\Controllers;

use App\Models\KategoriCustomer;
use Illuminate\Http\Request;

class KategoriCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kategoricustomer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategoricustomer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' =>'required|unique:kategori_customers,nama',
        ],[
            'nama.required'=>'Silahkan Masukkan Nama Kategori',
            'nama.unique'=>'Nama Kategori Ini Sudah DIgunakan Sebelumnya',
        ]);

        KategoriCustomer::create( $request->except(['_token','_method']));

        return redirect()->route('kategoricustomer.index')->with('success', 'Kategori Customer Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriCustomer $kategoriCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriCustomer $kategoricustomer)
    {
        return view('kategoricustomer.edit', compact('kategoricustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriCustomer $kategoricustomer)
    {
        $request->validate([
            'nama' =>'required|unique:kategori_customers,nama,'.$kategoricustomer->id,
        ],[
            'nama.required'=>'Silahkan Masukkan Nama Kategori',
            'nama.unique'=>'Nama Kategori Ini Sudah DIgunakan Sebelumnya',
        ]);

        KategoriCustomer::where('id',$kategoricustomer->id)
        ->update( $request->except(['_token','_method']));

        return redirect()->route('kategoricustomer.index')->with('success', 'Kategori Customer Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriCustomer $kategoricustomer)
    {
        $kategoricustomer->delete();
        return redirect()->route('kategoricustomer.index')->with('success', 'Kategori Customer Berhasil Dihapus');
    }
}
