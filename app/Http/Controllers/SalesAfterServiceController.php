<?php

namespace App\Http\Controllers;

use App\Models\PesananMbs;
use App\Models\SalesAfterService;
use Illuminate\Http\Request;

class SalesAfterServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('salesafterservice.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_pesanan_mbs=PesananMbs::get();
        return view('salesafterservice.create',compact('data_pesanan_mbs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SalesAfterService::create($request->except(['_token','_method']));

        return redirect()->route('salesafterservice.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesAfterService $salesAfterService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesAfterService $salesafterservice)
    {
        $data_pesanan_mbs=PesananMbs::get();

        return view('salesafterservice.edit',compact('salesafterservice','data_pesanan_mbs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SalesAfterService $salesafterservice)
    {
        $salesafterservice->update($request->except(['_token','_method']));

        return redirect()->route('salesafterservice.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesAfterService $salesafterservice)
    {
        $salesafterservice->delete();

        return redirect()->route('salesafterservice.index')->with('success', 'Data berhasil dihapus');
    }

    public function print(Request $request){
        $mulai_dari=$request->mulai_dari;
        $sampai_dengan=$request->sampai_dengan;

        $data_sales_after_service=SalesAfterService::with('pesananmbscargo')
        ->whereBetween('tanggal',[$mulai_dari,$sampai_dengan])
        ->get();

        return view('salesafterservice.create',compact('mulai_dari','sampai_dengan'));

    }
}
