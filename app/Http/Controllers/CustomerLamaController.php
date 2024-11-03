<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\CustomerLama;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerLamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customerlama.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_wilayah=Wilayah::get();
        return view('customerlama.create',compact('data_wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required|unique:customer_lamas,email',
            'no_telp'=>'required|unique:customer_lamas,no_telp,',
            'organisasi'=>'required',
            'alamat_detail'=>'required',
            'agama'=>'required',
            'tanggal_lahir'=>'required',
            'tempat_lahir'=>'required',
            'wilayah_id'=>"required"
        ],[
            'nama.required'=>'Silahkan Masukkan Nama',
            'email.required'=>'Silahkan Masukkan Email',
            'email.unique'=>'Email Sudah Terdaftar',
            'no_telp.required'=>'Silahkan Masukkan No Telepon',
            'no_telp.unique'=>'No Telepon Sudah Terdaftar',
            'organisasi.required'=>'Silahkan Masukkan Organisasi',
            'alamat_detail.required'=>'Silahkan Masukkan Alamat Detail',
            'agama.required'=>'Silahkan Masukkan Agama',
            'tanggal_lahir.required'=>'Silahkan Masukkan Tanggal Lahir',
            'tempat_lahir.required'=>'Silahkan Masukkan Tempat Lahir',
            'wilayah_id.required'=>'Silahkan Pilih Wilayah'
        ]);

        CustomerLama::create($request->except(['_token','_method']));

        return redirect()->route('customerlama.index')->with('success','Data Customer Lama Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerLama $customerLama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerLama $customerlama)
    {
        $data_wilayah = Wilayah::get();
        return view('customerlama.edit', compact('customerlama','data_wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerLama $customerlama)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required|unique:customer_lamas,email,'.$customerlama->id,
            'no_telp'=>'required|unique:customer_lamas,no_telp,'.$customerlama->id,
            'organisasi'=>'required',
            'alamat_detail'=>'required',
            'agama'=>'required',
            'tanggal_lahir'=>'required',
            'tempat_lahir'=>'required',
            'wilayah_id'=>"required"
        ],[
            'nama.required'=>'Silahkan Masukkan Nama',
            'email.required'=>'Silahkan Masukkan Email',
            'email.unique'=>'Email Sudah Terdaftar',
            'no_telp.required'=>'Silahkan Masukkan No Telepon',
            'no_telp.unique'=>'No Telepon Sudah Terdaftar',
            'organisasi.required'=>'Silahkan Masukkan Organisasi',
            'alamat_detail.required'=>'Silahkan Masukkan Alamat Detail',
            'agama.required'=>'Silahkan Masukkan Agama',
            'tanggal_lahir.required'=>'Silahkan Masukkan Tanggal Lahir',
            'tempat_lahir.required'=>'Silahkan Masukkan Tempat Lahir',
            'wilayah_id.required'=>'Silahkan Pilih Wilayah'
        ]);

        CustomerLama::where('id',$customerlama->id)->update($request->except(['_token','_method']));

        return redirect()->route('customerlama.index')->with('success','Data Customer Lama Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerLama $customerlama)
    {
        $customerlama->delete();
        return redirect()->route('customerlama.index')->with('success','Data Customer Lama Berhasil Dihapus');
    }
}
