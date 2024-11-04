<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Wilayah;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\FollowupCustomer;
use Illuminate\Routing\Controller;

class FollowupCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('followupcustomer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_wilayah = Wilayah::get();
        $data_karyawan = Karyawan::get();
        $data_kontak = Kontak::get();
        return view('followupcustomer.create', compact('data_wilayah', 'data_karyawan', 'data_kontak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FollowupCustomer::create($request->except(['_token', '_method']));

        return redirect()->route('followupcustomer.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(FollowupCustomer $followupCustomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FollowupCustomer $followupcustomer)
    {
        $data_wilayah = Wilayah::get();
        $data_karyawan = Karyawan::get();
        $data_kontak = Kontak::get();
        return view('followupcustomer.edit', compact('followupcustomer', 'data_wilayah', 'data_karyawan', 'data_kontak'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FollowupCustomer $followupcustomer)
    {
        $followupcustomer->update($request->except(['_token', '_method']));

        return redirect()->route('followupcustomer.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FollowupCustomer $followupCustomer)
    {
        $followupCustomer->delete();
        return redirect()->route('followupcustomer.index')->with('success', 'Data berhasil diubah');
    }

    public function print(Request $request)
    {
        $mulai_dari = $request->mulai_dari;
        $sampai_dengan = $request->sampai_dengan;
        $karyawan_id=$request->karyawan_id;
        $jenis_kontak_id=$request->jenis_kontak_id;


        $data_followup_customer = FollowupCustomer::with('wilayahasal', 'wilayahtujuan', 'kontak', 'karyawan')
        ->whereBetween('tanggal', [$mulai_dari, $sampai_dengan])
        ->when($karyawan_id != 'semua', function ($query) use ($karyawan_id) {
            $query->where('karyawan_id', $karyawan_id);
        })
        ->when($jenis_kontak_id != 'semua', function ($query) use ($jenis_kontak_id) {
            $query->where('kontak_id', $jenis_kontak_id);
        })
        ->get();

        return view('followupcustomer.print',compact('mulai_dari','sampai_dengan','data_followup_customer'));
    }
}
