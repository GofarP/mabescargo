<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupCustomerLama extends Model
{
    use HasFactory;

    protected $guarded=[''];

    public function customerlama(){
        return $this->belongsTo(CustomerLama::class,'customer_lama_id','id');
    }

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }

    public function kategoricustomer(){
        return $this->belongsTo(KategoriCustomer::class,'kategori_customer_id','id');
    }

    public function tipecustomer(){
        return $this->belongsTo(TipeCustomer::class,'tipe_customer_id','id');
    }




}
