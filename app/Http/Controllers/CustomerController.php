<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_wilayah = Wilayah::get();
        return view('customer.create', compact('data_wilayah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:customer,email',
            'no_telp' => 'required|numeric',
            'wilayah_id' => 'required',
            'alamat_detail' => "required",
            'agama' => 'required',
            'tanggal_lahir' => "required",
            'tempat_lahir' => 'required'
        ], [
            'tanggal.required' => 'Silahkan Masukkan Tanggal Tambah Customer',
            'nama.required' => 'Silahkan Masukkan nama Customer',
            'email.required' => 'Silahkan Masukkan Email',
            'email.email' => 'Format Email Salah',
            'no_telp.required' => 'Silahkan Masukkan No Telp',
            'no_telp.numeric' => 'No Telp Harus Berupa Angka',
            'wilayah_id.required' => 'Silahkan Pilih Wilayah Customer',
            'alamat_detail.required' => 'Silahkan Masukkan Alamat Detail Customer',
            'agama.required' => 'Silahkan Masukkan Agama',
            'tanggal_lahir.required' => 'Silahkan Masukkan Tanggal Lahir',
            'tempat_lahir.required' => "Silahkan Masukkan Tempat Lahir"
        ]);

        Customer::create($request->except(['_method', '_token']));

        return redirect()->route('customer.index')->with('success', 'Sukses Menambahhkan Data Customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $data_wilayah = Wilayah::get();
        return view('customer.edit', compact('data_wilayah', 'customer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:customer,email,'.$customer->id,
            'no_telp' => 'required|numeric',
            'wilayah_id' => 'required',
            'alamat_detail' => "required",
            'agama' => 'required',
            'tanggal_lahir' => "required",
            'tempat_lahir' => 'required'
        ], [
            'tanggal.required' => 'Silahkan Masukkan Tanggal Tambah Customer',
            'nama.required' => 'Silahkan Masukkan nama Customer',
            'email.required' => 'Silahkan Masukkan Email',
            'email.email' => 'Format Email Salah',
            'no_telp.required' => 'Silahkan Masukkan No Telp',
            'no_telp.numeric' => 'No Telp Harus Berupa Angka',
            'wilayah_id.required' => 'Silahkan Pilih Wilayah Customer',
            'alamat_detail.required' => 'Silahkan Masukkan Alamat Detail Customer',
            'agama.required' => 'Silahkan Masukkan Agama',
            'tanggal_lahir.required' => 'Silahkan Masukkan Tanggal Lahir',
            'tempat_lahir.required' => "Silahkan Masukkan Tempat Lahir"
        ]);

        $customer->update($request->except(['_token','_method']));

        return redirect()->route('customer.index')->with('success', 'Sukses Mengubah Data Customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index')->with('success','Sukses Menghapus Customer');
    }

    public function print(Request $request){
        $mulai_dari=$request->mulai_dari;
        $sampai_dengan=$request->sampai_dengan;

        $data_customer=Customer::whereBetween('tanggal',[$mulai_dari,$sampai_dengan])
        ->orderBy('tanggal','desc')
        ->get();


        return view('customer.print', compact('data_customer','mulai_dari','sampai_dengan'));
    }
}
