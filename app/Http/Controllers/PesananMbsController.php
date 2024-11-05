<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use App\Models\Cabang;
use App\Models\Wilayah;
use App\Models\Customer;
use App\Models\Karyawan;
use App\Models\PesananMbs;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use App\Models\StatusPembayaran;
use Illuminate\Routing\Controller;

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
        $data_customer = Customer::get();
        $data_karyawan = Karyawan::get();
        $data_metode_pembayaran = MetodePembayaran::get();
        $data_status_pembayaran = StatusPembayaran::get();
        $data_jalur = Jalur::get();
        $data_wilayah = Wilayah::get();
        $data_cabang = Cabang::get();
        return view('pesananmbs.create', compact('data_customer', 'data_karyawan', 'data_metode_pembayaran', 'data_status_pembayaran', 'data_jalur', 'data_wilayah', 'data_cabang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PesananMbs::create($request->except(['_token', '_method']));

        return redirect()->route('pesananmbs.index')->with('success', 'Sukses Meambah Pesanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PesananMbs $pesananmbs)
    {
        return view('pesananmbs.resi',compact('pesananmbs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesananMbs $pesananmbs)
    {
        $data_customer = Customer::get();
        $data_karyawan = Karyawan::get();
        $data_metode_pembayaran = MetodePembayaran::get();
        $data_status_pembayaran = StatusPembayaran::get();
        $data_jalur = Jalur::get();
        $data_wilayah = Wilayah::get();
        $data_cabang = Cabang::get();
        return view('pesananmbs.edit', compact('pesananmbs','data_customer', 'data_karyawan', 'data_metode_pembayaran', 'data_status_pembayaran', 'data_jalur', 'data_wilayah', 'data_cabang'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesananMbs $pesananmbs)
    {
        PesananMbs::where('id',$pesananmbs->id)->update($request->except(['_token', '_method']));

        return redirect()->route('pesananmbs.index')->with('success', 'Sukses Mengubah Pesanan');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesananMbs $pesananmbs)
    {

        $pesananmbs->delete();

        return redirect()->route('pesananmbs.index')->with('success', 'Sukses Menghapus Pesanan');
    }



    public function print(Request $request){
        $mulai_dari=$request->mulai_dari;
        $sampai_dengan=$request->sampai_dengan;
        $cabang=$request->cabang_id;
        $karyawan=$request->karyawan_id;
        $status_pembayaran=$request->status_pembayaran_id;

        $data_pesanan_mbs=PesananMbs::with('karyawan', 'customer', 'metodepembayaran', 'statuspembayaran', 'jalur', 'wilayahasal', 'wilayahtujuan', 'cabang')
        ->when($cabang!='semua',function($query) use($cabang){
            $query->where('cabang_id',$cabang);
        })
        ->when($karyawan!='semua',function($query) use($karyawan){
            $query->where('karyawan_id',$karyawan);
        })
        ->when($status_pembayaran!='semua',function($query) use($status_pembayaran){
            $query->where('status_pembayaran_id',$status_pembayaran);
        })
        ->whereBetween('waktu_pesan',[$mulai_dari, $sampai_dengan])
        ->get();

        $total_biaya_sum = $data_pesanan_mbs->sum('total_biaya');


        return view('pesananmbs.print',compact('mulai_dari','sampai_dengan','data_pesanan_mbs','total_biaya_sum'));
    }
}
