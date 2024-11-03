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
        $data_wilayah=Wilayah::get();
        $data_karyawan=Karyawan::get();
        $data_kontak=Kontak::get();
        return view('followupcustomer.create',compact('data_wilayah','data_karyawan','data_kontak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(FollowupCustomer $followupCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FollowupCustomer $followupCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FollowupCustomer $followupCustomer)
    {
        //
    }
}
