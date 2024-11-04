<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\FollowupTraffic;
use App\Models\FollowupCustomer;
use Illuminate\Routing\Controller;

class FollowupTrafficController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('followuptraffic.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_followup_customer =  FollowupCustomer::select('id', 'nama')->distinct()->get();;
        $data_wilayah = Wilayah::get();
        $data_karyawan = Karyawan::get();
        return view('followuptraffic.create', compact('data_wilayah', 'data_karyawan', 'data_followup_customer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FollowupTraffic::create($request->except(['_token', '_method']));

        return redirect()->route('followuptraffic.index')->with('success', 'Data Followup Traffic berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FollowupTraffic $followupTraffic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FollowupTraffic $followuptraffic)
    {
        $data_followup_customer =  FollowupCustomer::select('id', 'nama')->distinct()->get();;
        $data_wilayah = Wilayah::get();
        $data_karyawan = Karyawan::get();
        return view('followuptraffic.edit', compact('followuptraffic','data_wilayah', 'data_karyawan', 'data_followup_customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FollowupTraffic $followuptraffic)
    {
        $followuptraffic->update($request->except(['_token', '_method']));

        return redirect()->route('followuptraffic.index')->with('success', 'Data Followup Traffic berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FollowupTraffic $followuptraffic)
    {
        $followuptraffic->delete();

        return redirect()->route('followuptraffic.index')->with('success', 'Data Followup Traffic berhasil dihapus.');
    }

    public function print(Request $request){
        $mulai_dari=$request->mulai_dari;
        $sampai_dengan=$request->sampai_dengan;

        $data_followup_traffic=FollowupTraffic::with('wilayahasal','wilayahtujuan','karyawan','followupcustomer')
        ->whereBetween('tanggal',[$request->mulai_dari,$request->sampai_dengan])
        ->get();

        return view('followuptraffic.print',compact('data_followup_traffic','mulai_dari','sampai_dengan'));
    }
}
