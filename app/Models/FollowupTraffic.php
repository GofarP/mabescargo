<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupTraffic extends Model
{
    use HasFactory;

    protected $guarded=[''];

    public function followupcustomer(){
        return $this->belongsTo(FollowupCustomer::class,'followup_customer_id','id');
    }

    public function wilayahasal(){
        return $this->belongsTo(Wilayah::class,'wilayah_asal_id','id');
    }

    public function wilayahtujuan(){
        return $this->belongsTo(Wilayah::class,'wilayah_tujuan_id','id');
    }

    public function karyawan(){
        return $this->belongsTo(Karyawan::class,'karyawan_id','id');
    }
}
