<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\CustomerLama;
use App\Models\KategoriCustomer;
use App\Models\TipeCustomer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\FollowupCustomerLama;

class FollowupCustomerLamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('followupcustomerlama.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_karyawan=Karyawan::get();
        $data_customer_lama=CustomerLama::get();
        $data_kategori_pelanggan=KategoriCustomer::get();
        $data_tipe_pelanggan=TipeCustomer::get();

        return view('followupcustomerlama.create',compact('data_karyawan','data_customer_lama','data_kategori_pelanggan','data_tipe_pelanggan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FollowupCustomerLama::create($request->except(['_token','_method']));

        return redirect()->route('followupcustomerlama.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(FollowupCustomerLama $followupCustomerLama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FollowupCustomerLama $followupcustomerlama)
    {
        $data_karyawan=Karyawan::get();
        $data_customer_lama=CustomerLama::get();
        $data_kategori_pelanggan=KategoriCustomer::get();
        $data_tipe_pelanggan=TipeCustomer::get();

        return view('followupcustomerlama.edit',compact('data_karyawan','data_customer_lama','data_kategori_pelanggan','data_tipe_pelanggan','followupcustomerlama'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FollowupCustomerLama $followupcustomerlama)
    {
        $followupcustomerlama->update($request->except(['_token','_method']));

        return redirect()->route('followupcustomerlama.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FollowupCustomerLama $followupcustomerlama)
    {
        $followupcustomerlama->delete();

        return redirect()->route('followupcustomerlama.index')->with('success', 'Data berhasil dihapus');
    }

    public function print(Request $request)
    {
        $mulai_dari = $request->mulai_dari;
        $sampai_dengan = $request->sampai_dengan;
        $karyawan = $request->karyawan_id;
        $kategori_customer = $request->kategori_customer_id;
        $tipe_customer = $request->tipe_customer_id;

        $data_followup_customer_lama = FollowupCustomerLama::with('customerlama', 'karyawan', 'kategoricustomer', 'tipecustomer')
            ->whereBetween('tanggal', [$mulai_dari, $sampai_dengan])
            ->when($karyawan != 'semua', function ($query) use($karyawan){
                $query->where('karyawan_id', $karyawan);
            })
            ->when($kategori_customer != 'semua', function ($query) use($kategori_customer){
                $query->where('kategori_customer_id', $kategori_customer);
            })
            ->when($tipe_customer != 'semua', function ($query) use($tipe_customer){
                $query->where('tipe_customer_id', $tipe_customer);
            })
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('followupcustomerlama.print',compact('data_followup_customer_lama','mulai_dari','sampai_dengan'));
    }
}
